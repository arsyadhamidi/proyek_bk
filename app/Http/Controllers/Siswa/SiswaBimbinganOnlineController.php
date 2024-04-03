<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\BimbinganOnline;
use App\Models\GuruBk;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaBimbinganOnlineController extends Controller
{
    public function index()
    {
        return view('siswa.bimbingan-online.index', [
            'gurubks' => GuruBk::latest()->get(),
        ]);
    }

    public function show($id)
    {
        $siswas = Siswa::where('users_id', Auth()->user()->id)->first();
        return view('siswa.bimbingan-online.show', [
            'gurubks' => GuruBk::where('id', $id)->first(),
            'bimbingans' => BimbinganOnline::where('siswa_id', $siswas->id)->where('gurubk_id', $id)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $siswas = Siswa::where('users_id', Auth()->user()->id)->first();

        BimbinganOnline::create([
            'siswa_id' => $siswas->id,
            'gurubk_id' => $request->gurubk_id,
            'pesan' => $request->pesan,
            'statusbimbingan' => 'Siswa',
        ]);

        return redirect('bimbingan-online/' . $request->gurubk_id);
    }
}
