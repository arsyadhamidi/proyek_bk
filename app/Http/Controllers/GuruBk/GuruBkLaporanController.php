<?php

namespace App\Http\Controllers\GuruBk;

use App\Models\Siswa;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuruBkLaporanController extends Controller
{

    public function index()
    {
        return view('guru-bk.laporan.index', [
            'siswas' => Siswa::latest()->get(),
        ]);
    }

    public function show($id)
    {
        return view('guru-bk.laporan.show', [
            'laporans' => Laporan::where('siswa_id', $id)->latest()->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        Laporan::where('id', $id)->update([
            'status_laporan' => 'Selesai',
        ]);

        return redirect('gurubk-laporan')->with('success', 'Laporan Pengajuan telah selesai');
    }

}
