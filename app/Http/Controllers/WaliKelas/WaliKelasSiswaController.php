<?php

namespace App\Http\Controllers\WaliKelas;

use App\Models\Siswa;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WaliKelasSiswaController extends Controller
{
    public function index()
    {
        $walikelass = WaliKelas::where('id', Auth()->user()->walikelas_id)->first();
        return view('wali-kelas.siswa.index', [
            'siswas' => Siswa::where('kelas_id', $walikelass->kelas_id)->get(),
        ]);
    }
}
