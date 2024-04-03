<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use App\Models\GuruBk;
use App\Models\JadwalBimbingan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiswaMengajukanBimbinganController extends Controller
{
    public function index()
    {
        return view('siswa.bimbingan.index', [
            'bimbingans' => Bimbingan::where('siswa_id', Auth()->user()->id)->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('siswa.bimbingan.create', [
            'gurubks' => GuruBk::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jadwal_id' => 'required',
            'gurubk_id' => 'required',
            'keterangan_bimbingan' => 'required',
            'status_bimbingan' => 'required',
            'tgl_bimbingan' => 'required',
        ], [
            'jadwal_id.required' => 'Jadwal Bimbingan wajib diisi',
            'gurubk_id.required' => 'Guru BK wajib diisi',
            'keterangan_bimbingan.required' => 'Keterangan Bimbingan wajib diisi',
            'status_bimbingan.required' => 'Layanan Bimbingan wajib diisi',
            'tgl_bimbingan.required' => 'Tanggal Bimbingan wajib diisi',
        ]);

        $validated['siswa_id'] = Auth()->user()->id;

        Bimbingan::create($validated);

        return redirect('mengajukan-bimbingan')->with('success', 'Anda berhasil melakukan bimbingan');
    }

    public function edit($id)
    {
        return view('siswa.bimbingan.edit', [
            'bimbingans' => Bimbingan::where('id', $id)->first(),
            'gurubks' => GuruBk::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jadwal_id' => 'required',
            'gurubk_id' => 'required',
            'keterangan_bimbingan' => 'required',
            'status_bimbingan' => 'required',
            'tgl_bimbingan' => 'required',
        ]);

        $validated['siswa_id'] = Auth()->user()->id;

        Bimbingan::where('id', $id)->update($validated);

        return redirect('mengajukan-bimbingan')->with('success', 'Anda berhasil melakukan edit bimbingan');
    }

    public function jqueryGuruBk(Request $request)
    {
        $id_gurubk = $request->id_gurubk;

        $jadwals = JadwalBimbingan::where('gurubk_id', $id_gurubk)->get();

        foreach ($jadwals as $data) {
            echo "<option value='$data->id'>$data->hari_jadwal / $data->jam_mulai_bimbingan - $data->jam_selesai_bimbingan</option>";
        }
    }

    public function getGuruBkByDate(Request $request)
    {
        $selectedDate = $request->selectedDate;
        Carbon::setlocale('id');
        $dayOfWeek = Carbon::parse($selectedDate)->translatedFormat('l');

        $gurubks = GuruBk::whereHas('jadwal', function ($query) use ($dayOfWeek) {
            $query->where('hari_jadwal', $dayOfWeek)->whereNotNull('hari_jadwal');
        })->get();

        $options = '';
        $options = '<option value ="" selected>Pilih Guru BK </option>';
        foreach ($gurubks as $data) {
            $options .= '<option value="' . $data->id . '">' . ($data->nama_gurubk ?? '-') . '</option>';
        }

        return response()->json(['options' => $options]);
    }

    public function getJadwalBimbingan($id, Request $request) // Perbaikan parameter $request
    {
        $selectedDate = $request->input('tgl_bimbingan');

        // Set locale ke bahasa Indonesia
        \Carbon\Carbon::setLocale('id'); // Menggunakan namespace global

        // Mendapatkan nama hari dalam bahasa Indonesia
        $hariJadwal = \Carbon\Carbon::parse($selectedDate)->translatedFormat('l');

        // Menggunakan nama hari dalam bahasa Indonesia untuk mencari jadwal dokter
        $jadwal = JadwalBimbingan::where('gurubk_id', $id)
            ->where('hari_jadwal', $hariJadwal)
            ->first();

        $options = '<option value ="" selected>Pilih Guru BK </option>';
        if ($jadwal) {
            $options .= '<option value="' . $jadwal->id . '">' . ($jadwal->hari_jadwal ?? '-') . '/' . ($jadwal->jam_mulai_bimbingan ?? '-') . '-' . ($jadwal->jam_selesai_bimbingan ?? '-') . '</option>';
        }

        return response()->json(['options' => $options]);
    }
}
