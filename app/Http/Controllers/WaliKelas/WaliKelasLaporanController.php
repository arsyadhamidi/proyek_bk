<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\GuruBk;
use App\Models\Laporan;
use App\Models\Siswa;
use App\Models\WaliKelas;
use Illuminate\Http\Request;

class WaliKelasLaporanController extends Controller
{
    public function index()
    {
        return view('wali-kelas.laporan.index', [
            'laporans' => Laporan::where('walikelas_id', Auth()->user()->walikelas_id)->latest()->get(),
        ]);
    }

    public function create()
    {
        $walikelass = WaliKelas::where('id', Auth()->user()->walikelas_id)->first();
        return view('wali-kelas.laporan.create', [
            'gurubks' => GuruBk::all(),
            'siswas' => Siswa::where('kelas_id', $walikelass->kelas_id)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gurubk_id' => 'required',
            'siswa_id' => 'required',
            'laporan_siswa' => 'required',
        ]);

        $validated['status_laporan'] = 'Pengajuan';
        $validated['walikelas_id'] = Auth()->user()->walikelas_id;

        Laporan::create($validated);

        return redirect('laporan-walikelas')->with('success', 'Anda berhasil melakukan pengajuan laporan siswa');
    }

    public function edit($id)
    {
        $walikelass = WaliKelas::where('id', Auth()->user()->walikelas_id)->first();
        return view('wali-kelas.laporan.edit', [
            'gurubks' => GuruBk::all(),
            'siswas' => Siswa::where('kelas_id', $walikelass->kelas_id)->get(),
            'laporans' => Laporan::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'gurubk_id' => 'required',
            'siswa_id' => 'required',
            'laporan_siswa' => 'required',
        ]);

        $validated['status_laporan'] = 'Pengajuan';
        $validated['walikelas_id'] = Auth()->user()->walikelas_id;

        Laporan::where('id', $id)->update($validated);

        return redirect('laporan-walikelas')->with('success', 'Anda berhasil melakukan edit pengajuan laporan siswa');
    }

    public function destroy($id)
    {
        Laporan::where('id', $id)->delete();
        return redirect('laporan-walikelas')->with('success', 'Anda berhasil melakukan hapus pengajuan laporan siswa');
    }
}
