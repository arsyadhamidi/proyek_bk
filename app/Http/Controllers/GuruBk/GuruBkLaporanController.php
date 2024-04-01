<?php

namespace App\Http\Controllers\GuruBk;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class GuruBkLaporanController extends Controller
{

    public function index()
    {
        $laporans = Siswa::whereHas('laporan', function ($query) {
            $query->whereNotNull('siswa_id');
        })->latest()->get();
        return view('guru-bk.laporan.index', [
            'siswas' => $laporans,
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
