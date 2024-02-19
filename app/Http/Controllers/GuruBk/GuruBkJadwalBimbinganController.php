<?php

namespace App\Http\Controllers\GuruBk;

use App\Http\Controllers\Controller;
use App\Models\JadwalBimbingan;
use Illuminate\Http\Request;

class GuruBkJadwalBimbinganController extends Controller
{
    public function index()
    {
        return view('guru-bk.jadwal.index', [
            'jadwals' => JadwalBimbingan::where('gurubk_id', Auth()->user()->gurubk_id)->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('guru-bk.jadwal.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hari_jadwal' => 'required',
            'jam_mulai_bimbingan' => 'required',
            'jam_selesai_bimbingan' => 'required',
        ]);

        $validated['gurubk_id'] = Auth()->user()->gurubk_id;

        JadwalBimbingan::create($validated);

        return redirect('buat-jadwal')->with('success', 'Anda berhasil membuat jadwal bimbingan');
    }

    public function edit($id)
    {
        return view('guru-bk.jadwal.edit', [
            'jadwals' => JadwalBimbingan::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'hari_jadwal' => 'required',
            'jam_mulai_bimbingan' => 'required',
            'jam_selesai_bimbingan' => 'required',
        ]);

        $validated['gurubk_id'] = Auth()->user()->gurubk_id;

        JadwalBimbingan::where('id', $id)->update($validated);

        return redirect('buat-jadwal')->with('success', 'Anda berhasil mengedit jadwal bimbingan');
    }

    public function destroy($id)
    {
        JadwalBimbingan::where('id', $id)->delete();
        return redirect('buat-jadwal')->with('success', 'Anda berhasil menghapus jadwal bimbingan');
    }
}
