<?php

namespace App\Http\Controllers\GuruBk;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class GuruBkLaporanController extends Controller
{

    public function index()
    {
        return view('guru-bk.laporan.index', [
            'laporans' => Laporan::where('gurubk_id', Auth()->user()->gurubk_id)->latest()->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        Laporan::where('id', $id)->update([
            'status_laporan' => 'Selesai'
        ]);

        return redirect('gurubk-laporan')->with('success', 'Laporan Pengajuan telah selesai');
    }


}
