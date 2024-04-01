<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminWaliKelasController extends Controller
{
    public function index()
    {
        return view('admin.wali-kelas.index', [
            'jurusans' => Jurusan::latest()->get(),
        ]);
    }

    public function showkelas($id)
    {
        return view('admin.wali-kelas.show-kelas', [
            'kelass' => Kelas::where('jurusan_id', $id)->latest()->get(),
            'jurusans' => Jurusan::where('id', $id)->first(),
        ]);
    }

    public function create($id)
    {
        return view('admin.wali-kelas.create', [
            'kelass' => Kelas::where('id', $id)->first(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip_walikelas' => 'required',
            'nama_walikelas' => 'required|min:4',
            'jk_walikelas' => 'required',
            'telp_walikelas' => 'required|min:10',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'email_walikelas' => 'required|unique:wali_kelas',
        ], [
            'nip_walikelas.required' => 'NIP / Kode Wali Kelas wajib diisi',
            'nama_walikelas.required' => 'Nama Wali Kelas wajib diisi',
            'jk_walikelas.required' => 'Jenis Kelamin Wali Kelas wajib diisi',
            'jurusan_id.required' => 'Jurusan Wali Kelas wajib diisi',
            'kelas_id.required' => 'Kelas Wali Kelas wajib diisi',
            'nip_walikelas.min' => 'Nip Wali Kelas minimal 4 karakter',
            'nama_walikelas.min' => 'Nama Wali Kelas minimal 4 karakter',
            'telp_walikelas.min' => 'Telp Wali Kelas minimal 10 karakter',
            'email_walikelas.required' => 'Email Wali Kelas wajib diisi',
            'email_walikelas.unique' => 'Email Wali Kelas sudah tersedia',
            'telp_walikelas.required' => 'Telp Wali Kelas wajib diisi',
        ]);

        if ($request->file('foto_walikelas')) {
            $validated['foto_walikelas'] = $request->file('foto_walikelas')->store('foto_walikelas');
        } else {
            $validated['foto_walikelas'] = null;
        }

        WaliKelas::create($validated);

        $walikelass = Walikelas::latest()->first();

        User::create([
            'name' => $validated['nama_walikelas'],
            'email' => $validated['email_walikelas'],
            'password' => bcrypt('12345678'),
            'duplicate' => '12345678',
            'telp' => $validated['telp_walikelas'],
            'level' => 'Wali Kelas',
            'walikelas_id' => $walikelass->id,
        ]);

        return redirect('data-walikelas/show/' . $request->kelas_id)->with('success', 'Data wali kelas berhasil ditambahkan!');
    }

    public function show($id)
    {
        return view('admin.wali-kelas.show', [
            'walikelass' => WaliKelas::where('kelas_id', $id)->latest()->get(),
            'kelass' => Kelas::where('id', $id)->first(),
        ]);
    }

    public function edit($id)
    {
        return view('admin.wali-kelas.edit', [
            'walikelass' => WaliKelas::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nip_walikelas' => 'required',
            'nama_walikelas' => 'required|min:4',
            'jk_walikelas' => 'required',
            'telp_walikelas' => 'required|min:10',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'email_walikelas' => 'required|unique:wali_kelas',
        ], [
            'nip_walikelas.required' => 'NIP / Kode Wali Kelas wajib diisi',
            'nama_walikelas.required' => 'Nama Wali Kelas wajib diisi',
            'jk_walikelas.required' => 'Jenis Kelamin Wali Kelas wajib diisi',
            'jurusan_id.required' => 'Jurusan Wali Kelas wajib diisi',
            'kelas_id.required' => 'Kelas Wali Kelas wajib diisi',
            'nip_walikelas.min' => 'Nip Wali Kelas minimal 4 karakter',
            'nama_walikelas.min' => 'Nama Wali Kelas minimal 4 karakter',
            'telp_walikelas.min' => 'Telp Wali Kelas minimal 10 karakter',
            'email_walikelas.required' => 'Email Wali Kelas wajib diisi',
            'email_walikelas.unique' => 'Email Wali Kelas sudah tersedia',
            'telp_walikelas.required' => 'Telp Wali Kelas wajib diisi',
        ]);

        $walikelass = WaliKelas::where('id', $id)->first();

        if ($request->file('foto_walikelas')) {

            if ($walikelass->foto_walikelas) {
                Storage::delete($walikelass->foto_walikelas);
            }

            $validated['foto_walikelas'] = $request->file('foto_walikelas')->store('foto_walikelas');
        } else {
            $validated['foto_walikelas'] = $walikelass->foto_walikelas;
        }

        WaliKelas::where('id', $id)->update($validated);

        $walikelass = Walikelas::latest()->first();

        User::where('walikelas_id', $id)->update([
            'name' => $validated['nama_walikelas'],
            'email' => $validated['email_walikelas'],
            'password' => bcrypt('12345678'),
            'duplicate' => '12345678',
            'telp' => $validated['telp_walikelas'],
            'level' => 'Wali Kelas',
        ]);

        return redirect('data-walikelas/show/' . $request->kelas_id)->with('success', 'Data wali kelas berhasil diedit!');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::where('walikelas_id', $id)->first();

        // Delete the associated image file
        if ($user->foto_profile) {
            Storage::delete($user->foto_profile);
        }

        $user->delete();

        WaliKelas::where('id', $id)->delete();

        return redirect('data-walikelas/show/' . $request->kelas_id)->with('success', 'Data wali kelas berhasil hapus!');

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
