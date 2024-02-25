<?php

namespace App\Http\Controllers\GuruBk;

use App\Http\Controllers\Controller;
use App\Models\BimbinganOnline;
use Illuminate\Http\Request;

class GuruBkBimbinganOnlineController extends Controller
{
    public function index()
    {
        return view('guru-bk.bimbingan-online.index', [
            'bimbingans' => BimbinganOnline::where('gurubk_id', Auth()->user()->gurubk_id)->latest()->get(),
        ]);
    }

    public function edit($id)
    {
        return view('guru-bk.bimbingan-online.edit', [
            'bimbingans' => BimbinganOnline::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        BimbinganOnline::where('id', $id)->update([
            'balasan_online' => $request->balasan_online,
        ]);

        return redirect('layanan-online')->with('success', 'Anda berhasil memberikan balasan bimbingan');
    }
}
