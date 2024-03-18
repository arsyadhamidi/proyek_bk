<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuruBk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'nama_gurubk' => 'required|min:2',
            'jk_gurubk' => 'required',
            'telp_gurubk' => 'required',
            'email_gurubk' => 'required|email:dns',
        ], [
            'nama_gurubk.required' => 'Nama guru bk tidak boleh kosong!',
            'nama_gurubk.min' => 'Nama guru bk minimal 2 karakter!',
            'jk_gurubk.required' => 'Jenis Kelamin guru bk tidak boleh kosong!',
            'telp_gurubk.required' => 'Telepon guru bk tidak boleh kosong!',
            'email_gurubk.required' => 'Email guru bk tidak boleh kosong!',
        ]);

        if ($request->nip_gurubk) {
            $validated['nip_gurubk'] = $request->nip_gurubk;
        } else {
            $validated['nip_gurubk'] = null;
        }

        $validated['telp_gurubk'] = '+62' . $request->telp_gurubk;
        if ($request->file('foto_gurubk')) {
            $validated['foto_gurubk'] = $request->file('foto_gurubk')->store('foto_gurubk');
        } else {
            $validated['foto_gurubk'] = null;
        }

        GuruBk::create($validated);

        $gurubks = GuruBk::latest()->first();

        User::create([
            'name' => $validated['nama_gurubk'],
            'email' => $validated['email_gurubk'],
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
            'nama_gurubk' => 'required|min:4',
            'jk_gurubk' => 'required',
            'telp_gurubk' => 'required',
            'email_gurubk' => 'required|email:dns',
        ], [
            'nama_gurubk.required' => 'Nama guru bk tidak boleh kosong!',
            'nama_gurubk.min' => 'Nama guru bk minimal 4 karakter!',
            'jk_gurubk.required' => 'Jenis Kelamin guru bk tidak boleh kosong!',
            'telp_gurubk.required' => 'Telepon guru bk tidak boleh kosong!',
            'email_gurubk.required' => 'Email guru bk tidak boleh kosong!',
        ]);

        $validated['telp_gurubk'] = '+62' . $request->telp_gurubk;
        $gurubks = GuruBk::where('id', $id)->first();

        if ($request->nip_gurubk) {
            $validated['nip_gurubk'] = $request->nip_gurubk;
        } else {
            $validated['nip_gurubk'] = $gurubks->nip_gurubk;
        }

        if ($request->file('foto_gurubk')) {

            if ($gurubks->foto_gurubk) {
                Storage::delete($gurubks->foto_gurubk);
            }

            $validated['foto_gurubk'] = $request->file('foto_gurubk')->store('foto_gurubk');
        } else {
            $validated['foto_gurubk'] = $gurubks->foto_gurubk;
        }

        GuruBk::where('id', $id)->update($validated);

        User::where('gurubk_id', $id)->update([
            'name' => $validated['nama_gurubk'],
            'email' => $validated['email_gurubk'],
            'password' => bcrypt('12345678'),
            'level' => 'Guru BK',
            'telp' => $validated['telp_gurubk'],
        ]);

        return redirect('data-gurubk')->with('success', 'Data guru bk berhasil di edit!');
    }

    public function destroy($id)
    {
        $gurubks = GuruBk::where('id', $id)->first();
        if ($gurubks->foto_gurubk) {
            Storage::delete($gurubks->foto_gurubk);
        }
        User::where('gurubk_id', $id)->delete();

        GuruBk::where('id', $id)->delete();
        return redirect('data-gurubk')->with('success', 'Data guru bk berhasil di hapus!');
    }
}
