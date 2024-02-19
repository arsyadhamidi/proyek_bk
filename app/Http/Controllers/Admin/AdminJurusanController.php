<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminJurusanController extends Controller
{
    public function index()
    {
        return view('admin.jurusan.index', [
            'jurusans' => Jurusan::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_jurusan' => 'required|min:4',
            'nama_jurusan' => 'required|min:4',
        ], [
            'kode_jurusan.required' => 'Kode jurusan tidak boleh kosong',
            'kode_jurusan.min' => 'Kode jurusan minimal 4 karakter',
            'nama_jurusan.required' => 'Nama jurusan tidak boleh kosong',
            'nama_jurusan.min' => 'Nama jurusan minimal 4 karakter',
        ]);

        Jurusan::create($validated);

        return redirect('data-jurusan')->with('success', 'Data jurusan berhasil di tambahkan!');
    }

    public function edit($id)
    {
        return view('admin.jurusan.edit', [
            'jurusans' => Jurusan::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_jurusan' => 'required|min:4',
            'nama_jurusan' => 'required|min:4',
        ], [
            'kode_jurusan.required' => 'Kode jurusan tidak boleh kosong',
            'kode_jurusan.min' => 'Kode jurusan minimal 4 karakter',
            'nama_jurusan.required' => 'Nama jurusan tidak boleh kosong',
            'nama_jurusan.min' => 'Nama jurusan minimal 4 karakter',
        ]);

        Jurusan::find($id)->update($validated);

        return redirect('data-jurusan')->with('success', 'Data jurusan berhasil di edit!');
    }

    public function destroy($id)
    {
        Kelas::where('jurusan_id', $id)->delete();
        Jurusan::find($id)->delete();
        return redirect('data-jurusan')->with('success', 'Data jurusan berhasil di hapus!');
    }
}
