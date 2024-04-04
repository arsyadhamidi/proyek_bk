<?php

namespace App\Http\Controllers\GuruBk;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use Illuminate\Http\Request;
use PDF;

class GuruBkSiswaBimbinganController extends Controller
{
    public function index()
    {
        $guruBkId = Auth()->user()->gurubk_id;

        // Hitung jumlah bimbingan yang telah dibuat oleh guru BK pada hari ini
        $countBimbinganHariIni = Bimbingan::where('gurubk_id', $guruBkId)
            ->count();

        // Jika jumlah bimbingan belum mencapai batas, tampilkan bimbingan
        return view('guru-bk.bimbingan.index', [
            'bimbingans' => Bimbingan::where('gurubk_id', $guruBkId)->limit(10)->get(),
        ]);
    }

    public function create()
    {
        return view('guru-bk.bimbingan.create', [
            'bimbingans' => Bimbingan::latest()->get(),
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

    public function show($id)
    {
        $bimbingans = Bimbingan::where('gurubk_id', $id)->latest()->get();

        $pdf = PDF::loadview('guru-bk.bimbingan.export-pdf', ['bimbingans' => $bimbingans]);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream('laporan-bimbingan.pdf');
    }
}
