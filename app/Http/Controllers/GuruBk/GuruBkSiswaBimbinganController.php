<?php

namespace App\Http\Controllers\GuruBk;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use Illuminate\Http\Request;

class GuruBkSiswaBimbinganController extends Controller
{
    public function index()
    {
        return view('guru-bk.bimbingan.index', [
            'bimbingans' => Bimbingan::where('gurubk_id', Auth()->user()->gurubk_id)->latest()->get(),
        ]);
    }

    public function edit($id)
    {
        return view('guru-bk.bimbingan.edit', [
            'bimbingans' => Bimbingan::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'balasan_bimbingan' => 'required',
        ]);

        Bimbingan::where('id', $id)->update($validated);

        return redirect('bimbingan-siswa')->with('success', 'Anda berhasil melakukan balasan bimbingan');
    }
}
