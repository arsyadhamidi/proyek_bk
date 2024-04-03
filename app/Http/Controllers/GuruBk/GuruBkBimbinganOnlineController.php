<?php

namespace App\Http\Controllers\GuruBk;

use App\Http\Controllers\Controller;
use App\Models\BimbinganOnline;
use App\Models\Siswa;
use Illuminate\Http\Request;

class GuruBkBimbinganOnlineController extends Controller
{
    public function index()
    {
        return view('guru-bk.bimbingan-online.index', [
            'siswas' => Siswa::whereHas('bimbinganOnline', function ($query) {
                $query->where('gurubk_id', Auth()->user()->gurubk_id);
            })->latest()->get(),
        ]);
    }

    public function show($id)
    {
        BimbinganOnline::where('siswa_id', $id)->update([
            'countpesan' => 'Lihat',
        ]);

        return view('guru-bk.bimbingan-online.show', [
            'siswas' => Siswa::where('id', $id)->first(),
            'bimbingans' => BimbinganOnline::where('gurubk_id', Auth()->user()->gurubk_id)->where('siswa_id', $id)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $siswas = Siswa::where('users_id', Auth()->user()->id)->first();

        BimbinganOnline::create([
            'siswa_id' => $request->siswa_id,
            'gurubk_id' => Auth()->user()->gurubk_id,
            'pesan' => $request->pesan,
            'statusbimbingan' => 'Guru BK',
        ]);

        return redirect('layanan-online/show/' . $request->siswa_id);
    }

}
