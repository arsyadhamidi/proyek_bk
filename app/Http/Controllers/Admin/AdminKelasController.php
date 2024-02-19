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

    public function create()
    {
        return view('admin.kelas.create', [
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jurusan_id' => 'required',
            'nama_kelas' => 'required|min:4',
        ], [
            'jurusan_id.required' => 'Jurusan tidak boleh kosong',
            'nama_kelas.required' => 'Nama kelas tidak boleh kosong',
            'nama_kelas.min' => 'Nama kelas minimal 4 karakter',
        ]);

        Kelas::create($validated);

        return redirect('data-kelas')->with('success', 'Data kelas berhasil di tambahkan!');
    }

    public function show($id)
    {
        return view('admin.kelas.show', [
            'kelass' => Kelas::where('jurusan_id', $id)->latest()->get(),
        ]);
    }

    public function edit($id)
    {
        return view('admin.kelas.edit', [
            'kelass' => Kelas::find($id),
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jurusan_id' => 'required',
            'nama_kelas' => 'required|min:4',
        ], [
            'jurusan_id.required' => 'Jurusan tidak boleh kosong',
            'nama_kelas.required' => 'Nama kelas tidak boleh kosong',
            'nama_kelas.min' => 'Nama kelas minimal 4 karakter',
        ]);

        Kelas::find($id)->update($validated);

        return redirect('data-kelas')->with('success', 'Data kelas berhasil di edit!');
    }

    public function destroy($id)
    {
        Kelas::find($id)->delete();
        return redirect('data-kelas')->with('success', 'Data kelas berhasil di hapus!');
    }
}
