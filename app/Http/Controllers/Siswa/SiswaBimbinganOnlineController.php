<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\BimbinganOnline;
use App\Models\GuruBk;
use Illuminate\Http\Request;

class SiswaBimbinganOnlineController extends Controller
{
    public function index()
    {
        return view('siswa.bimbingan-online.index', [
            'bimbingans' => BimbinganOnline::where('siswa_id', Auth()->user()->siswa_id)->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('siswa.bimbingan-online.create', [
            'gurubks' => GuruBk::all(),
        ]);
    }

    public function store(Request $request)
    {
        BimbinganOnline::create([
            'siswa_id' => Auth()->user()->siswa_id,
            'gurubk_id' => $request->gurubk_id,
            'layanan_online' => $request->layanan_online,
            'keterangan_online' => $request->keterangan_online,
        ]);

        return redirect('bimbingan-online')->with('success', 'Anda berhasil melakukan bimbingan');
    }

    public function edit($id)
    {
        return view('siswa.bimbingan-online.edit', [
            'bimbingans' => BimbinganOnline::where('id', $id)->first(),
            'gurubks' => GuruBk::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        BimbinganOnline::where('id', $id)->update([
            'siswa_id' => Auth()->user()->siswa_id,
            'gurubk_id' => $request->gurubk_id,
            'layanan_online' => $request->layanan_online,
            'keterangan_online' => $request->keterangan_online,
        ]);

        return redirect('bimbingan-online')->with('success', 'Anda berhasil mengupdate bimbingan');
    }

    public function destroy($id)
    {
        BimbinganOnline::where('id', $id)->delete();
        return redirect('bimbingan-online')->with('success', 'Anda berhasil menghapus bimbingan');
    }
}
