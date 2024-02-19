<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuruBk;
use App\Models\User;
use Illuminate\Http\Request;

class AdminGuruBkController extends Controller
{
    public function index()
    {
        return view('admin.guru-bk.index', [
            'gurubks' => GuruBk::latest()->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.guru-bk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip_gurubk' => 'required|min:4|unique:guru_bks,nip_gurubk',
            'nama_gurubk' => 'required|min:4',
            'jk_gurubk' => 'required',
            'telp_gurubk' => 'required',
            'email_gurubk' => 'required|email:dns',
        ], [
            'nip_gurubk.required' => 'NIP guru bk tidak boleh kosong!',
            'nip_gurubk.min' => 'NIP guru bk minimal 4 karakter!',
            'nip_gurubk.unique' => 'NIP guru bk sudah tersedia!',
            'nama_gurubk.required' => 'Nama guru bk tidak boleh kosong!',
            'nama_gurubk.min' => 'Nama guru bk minimal 4 karakter!',
            'jk_gurubk.required' => 'Jenis Kelamin guru bk tidak boleh kosong!',
            'telp_gurubk.required' => 'Telepon guru bk tidak boleh kosong!',
            'email_gurubk.required' => 'Email guru bk tidak boleh kosong!',
        ]);

        $validated['telp_gurubk'] = '+62' . $request->telp_gurubk;

        GuruBk::create($validated);

        $gurubks = GuruBk::latest()->first();

        User::create([
            'name' => $validated['nama_gurubk'],
            'username' => $validated['nip_gurubk'],
            'password' => bcrypt('12345678'),
            'level' => 'Guru BK',
            'telp' => $validated['telp_gurubk'],
            'gurubk_id' => $gurubks->id,
        ]);

        return redirect('data-gurubk')->with('success', 'Data guru bk berhasil di tambahkan!');
    }

    public function edit($id)
    {
        return view('admin.guru-bk.edit', [
            'gurubks' => GuruBk::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nip_gurubk' => 'required|min:4|unique:guru_bks,nip_gurubk',
            'nama_gurubk' => 'required|min:4',
            'jk_gurubk' => 'required',
            'telp_gurubk' => 'required',
            'email_gurubk' => 'required|email:dns',
        ], [
            'nip_gurubk.required' => 'NIP guru bk tidak boleh kosong!',
            'nip_gurubk.min' => 'NIP guru bk minimal 4 karakter!',
            'nip_gurubk.unique' => 'NIP guru bk sudah tersedia!',
            'nama_gurubk.required' => 'Nama guru bk tidak boleh kosong!',
            'nama_gurubk.min' => 'Nama guru bk minimal 4 karakter!',
            'jk_gurubk.required' => 'Jenis Kelamin guru bk tidak boleh kosong!',
            'telp_gurubk.required' => 'Telepon guru bk tidak boleh kosong!',
            'email_gurubk.required' => 'Email guru bk tidak boleh kosong!',
        ]);

        $validated['telp_gurubk'] = '+62' . $request->telp_gurubk;

        GuruBk::where('id', $id)->update($validated);

        User::where('gurubk_id', $id)->update([
            'name' => $validated['nama_gurubk'],
            'username' => $validated['nip_gurubk'],
            'password' => bcrypt('12345678'),
            'level' => 'Guru BK',
            'telp' => $validated['telp_gurubk'],
        ]);

        return redirect('data-gurubk')->with('success', 'Data guru bk berhasil di edit!');
    }

    public function destroy($id)
    {
        User::where('gurubk_id', $id)->delete();

        GuruBk::where('id', $id)->delete();
        return redirect('data-gurubk')->with('success', 'Data guru bk berhasil di hapus!');
    }
}
