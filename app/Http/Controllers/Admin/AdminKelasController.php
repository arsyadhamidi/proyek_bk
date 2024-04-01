<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class AdminKelasController extends Controller
{
    public function index()
    {
        return view('admin.kelas.index', [
            'jurusans' => Jurusan::latest()->get(),
        ]);
    }

    public function create($id)
    {
        return view('admin.kelas.create', [
            'jurusans' => Jurusan::where('id', $id)->first(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|min:2',
        ], [
            'nama_kelas.required' => 'Nama kelas wajib diisi',
            'nama_kelas.min' => 'Nama kelas minimal 2 karakter',
        ]);

        $validated['jurusan_id'] = $request->jurusan_id;

        Kelas::create($validated);

        return redirect('data-kelas/show/' . $request->jurusan_id)->with('success', 'Data kelas berhasil di tambahkan!');
    }

    public function show($id)
    {
        return view('admin.kelas.show', [
            'kelass' => Kelas::where('jurusan_id', $id)->latest()->get(),
            'jurusans' => Jurusan::where('id', $id)->first(),
        ]);
    }

    public function edit($id)
    {
        return view('admin.kelas.edit', [
            'kelass' => Kelas::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|min:4',
        ], [
            'nama_kelas.required' => 'Nama kelas wajib diisi',
            'nama_kelas.min' => 'Nama kelas minimal 4 karakter',
        ]);

        $validated['jurusan_id'] = $request->jurusan_id;

        Kelas::find($id)->update($validated);

        return redirect('data-kelas/show/' . $request->jurusan_id)->with('success', 'Data kelas berhasil di edit!');
    }

    public function destroy(Request $request, $id)
    {
        Kelas::find($id)->delete();
        return redirect('data-kelas/show/' . $request->jurusan_id)->with('success', 'Data kelas berhasil di hapus!');
    }
}
