<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use App\Models\GuruBk;
use App\Models\JadwalBimbingan;
use Illuminate\Http\Request;

class SiswaMengajukanBimbinganController extends Controller
{
    public function index()
    {
        return view('siswa.bimbingan.index', [
            'bimbingans' => Bimbingan::where('siswa_id', Auth()->user()->siswa_id)->latest()->get(),
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
        ]);

        $validated['siswa_id'] = Auth()->user()->siswa_id;

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

        $validated['siswa_id'] = Auth()->user()->siswa_id;

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
}
