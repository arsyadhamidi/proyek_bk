<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;

class AdminWaliKelasController extends Controller
{
    public function index()
    {
        return view('admin.wali-kelas.index', [
            'jurusans' => Jurusan::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.wali-kelas.create', [
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip_walikelas' => 'required|min:4|unique:wali_kelas,nip_walikelas',
            'nama_walikelas' => 'required|min:4',
            'jk_walikelas' => 'required',
            'telp_walikelas' => 'required|min:10',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
        ], [
            'nip_walikelas.required' => 'Nip Wali Kelas tidak boleh kosong',
            'nip_walikelas.unique' => 'Nip Wali Kelas tidak boleh kosong',
            'nama_walikelas.required' => 'Nama Wali Kelas tidak boleh kosong',
            'jk_walikelas.required' => 'Jenis Kelamin Wali Kelas tidak boleh kosong',
            'jurusan_id.required' => 'Jurusan Wali Kelas tidak boleh kosong',
            'kelas_id.required' => 'Kelas Wali Kelas tidak boleh kosong',
            'nip_walikelas.min' => 'Nip Wali Kelas minimal 4 karakter',
            'nama_walikelas.min' => 'Nama Wali Kelas minimal 4 karakter',
            'telp_walikelas.min' => 'Telp Wali Kelas minimal 10 karakter',
        ]);

        $validated['telp_walikelas'] = '+62' . $request->telp_walikelas;

        WaliKelas::create($validated);

        $walikelass = Walikelas::latest()->first();

        User::create([
            'name' => $validated['nama_walikelas'],
            'username' => $validated['nip_walikelas'],
            'password' => bcrypt('12345678'),
            'telp' => $validated['telp_walikelas'],
            'level' => 'Wali Kelas',
            'walikelas_id' => $walikelass->id,
        ]);

        return redirect('data-walikelas/' . $request->jurusan_id)->with('success', 'Data wali kelas berhasil ditambahkan!');
    }

    public function show($id)
    {
        return view('admin.wali-kelas.show', [
            'walikelass' => WaliKelas::where('jurusan_id', $id)->latest()->get(),
        ]);
    }

    public function edit($id)
    {
        return view('admin.wali-kelas.edit', [
            'walikelass' => WaliKelas::where('id', $id)->first(),
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nip_walikelas' => 'required|min:4|unique:wali_kelas,nip_walikelas',
            'nama_walikelas' => 'required|min:4',
            'jk_walikelas' => 'required',
            'telp_walikelas' => 'required|min:10',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
        ], [
            'nip_walikelas.required' => 'Nip Wali Kelas tidak boleh kosong',
            'nip_walikelas.unique' => 'Nip Wali Kelas sudah tersedia',
            'nama_walikelas.required' => 'Nama Wali Kelas tidak boleh kosong',
            'jk_walikelas.required' => 'Jenis Kelamin Wali Kelas tidak boleh kosong',
            'jurusan_id.required' => 'Jurusan Wali Kelas tidak boleh kosong',
            'kelas_id.required' => 'Kelas Wali Kelas tidak boleh kosong',
            'nip_walikelas.min' => 'Nip Wali Kelas minimal 4 karakter',
            'nama_walikelas.min' => 'Nama Wali Kelas minimal 4 karakter',
            'telp_walikelas.min' => 'Telp Wali Kelas minimal 10 karakter',
        ]);

        $validated['telp_walikelas'] = '+62' . $request->telp_walikelas;

        WaliKelas::where('id', $id)->update($validated);

        $walikelass = Walikelas::latest()->first();

        User::where('walikelas_id', $id)->update([
            'name' => $validated['nama_walikelas'],
            'username' => $validated['nip_walikelas'],
            'password' => bcrypt('12345678'),
            'telp' => $validated['telp_walikelas'],
            'level' => 'Wali Kelas',
        ]);

        return redirect('data-walikelas/' . $request->jurusan_id)->with('success', 'Data wali kelas berhasil diedit!');
    }

    public function destroy($id)
    {
        $user = User::where('walikelas_id', $id)->first();

        // Delete the associated image file
        if ($user->foto_profile) {
            Storage::delete($user->foto_profile);
        }

        $user->delete();

        WaliKelas::where('id', $id)->delete();

        return redirect('data-walikelas')->with('success', 'Data wali kelas berhasil hapus!');

    }

    public function jqueryJurusan(Request $request)
    {
        $id_jurusan = $request->id_jurusan;

        $kelass = Kelas::where('jurusan_id', $id_jurusan)->get();

        foreach ($kelass as $kelas) {
            echo "<option value='$kelas->id'>$kelas->nama_kelas</option>";
        }
    }
}
