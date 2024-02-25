<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSiswaController extends Controller
{
    public function index()
    {
        return view('admin.siswa.index', [
            'jurusans' => Jurusan::latest()->get(),
        ]);
    }

    public function show($id)
    {
        return view('admin.siswa.show', [
            'siswas' => Siswa::where('kelas_id', $id)->latest()->get(),
        ]);
    }

    public function showkelas($id)
    {
        return view('admin.siswa.kelas', [
            'kelass' => Kelas::where('jurusan_id', $id)->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.siswa.create', [
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn_siswa' => 'required|unique:siswas,nisn_siswa',
            'nama_siswa' => 'required',
            'jk_siswa' => 'required',
            'tmp_lahir_siswa' => 'required',
            'tgl_lahir_siswa' => 'required',
            'alamat_siswa' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'agama_siswa' => 'required',
            'telp_siswa' => 'required',
            'telp_ortu_siswa' => 'required',
            'email_siswa' => 'required',
            'tgl_masuk_siswa' => 'required',
        ], [
            'nisn_siswa.unique' => 'NISN siswa sudah digunakan',
        ]);

        // Tanggal Kelulusan
        if ($request->tgl_lulus_siswa) {
            $validated['tgl_lulus_siswa'] = $request->tgl_lulus_siswa;
        } else {
            $validated['tgl_lulus_siswa'] = null;
        }

        // Nilai Siswa
        if ($request->nilai_siswa) {
            $validated['nilai_siswa'] = $request->nilai_siswa;
        } else {
            $validated['nilai_siswa'] = null;
        }

        // Keterangan siswa
        if ($request->keterangan_siswa) {
            $validated['keterangan_siswa'] = $request->keterangan_siswa;
        } else {
            $validated['keterangan_siswa'] = null;
        }

        Siswa::create($validated);

        $siswas = Siswa::latest()->first();

        User::create([
            'name' => $validated['nama_siswa'],
            'email' => $validated['email_siswa'],
            'password' => bcrypt('12345678'),
            'level' => 'Siswa',
            'telp' => $validated['telp_siswa'],
            'siswa_id' => $siswas->id,
        ]);

        return redirect('data-siswa')->with('success', 'Data siswa berhasil di tambahkan!');
    }

    public function edit($id)
    {
        return view('admin.siswa.edit', [
            'siswas' => Siswa::where('id', $id)->first(),
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nisn_siswa' => 'required|unique:siswas,nisn_siswa',
            'nama_siswa' => 'required',
            'jk_siswa' => 'required',
            'tmp_lahir_siswa' => 'required',
            'tgl_lahir_siswa' => 'required',
            'alamat_siswa' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'agama_siswa' => 'required',
            'telp_siswa' => 'required',
            'telp_ortu_siswa' => 'required',
            'email_siswa' => 'required',
            'tgl_masuk_siswa' => 'required',
        ], [
            'nisn_siswa.unique' => 'NISN siswa sudah digunakan',
        ]);

        // Tanggal Kelulusan
        if ($request->tgl_lulus_siswa) {
            $validated['tgl_lulus_siswa'] = $request->tgl_lulus_siswa;
        } else {
            $validated['tgl_lulus_siswa'] = null;
        }

        // Nilai Siswa
        if ($request->nilai_siswa) {
            $validated['nilai_siswa'] = $request->nilai_siswa;
        } else {
            $validated['nilai_siswa'] = null;
        }

        // Keterangan siswa
        if ($request->keterangan_siswa) {
            $validated['keterangan_siswa'] = $request->keterangan_siswa;
        } else {
            $validated['keterangan_siswa'] = null;
        }

        Siswa::where('id', $id)->update($validated);

        User::where('siswa_id', $id)->update([
            'name' => $validated['nama_siswa'],
            'email' => $validated['email_siswa'],
            'password' => bcrypt('12345678'),
            'level' => 'Siswa',
            'telp' => $validated['telp_siswa'],
        ]);

        return redirect('data-siswa')->with('success', 'Data siswa berhasil di edit!');
    }

    public function destroy($id)
    {
        User::where('siswa_id', $id)->delete();
        Siswa::where('id', $id)->delete();

        return redirect('data-siswa')->with('success', 'Data siswa berhasil di hapus!');
    }

    public function jquerySiswa(Request $request)
    {
        $id_jurusan = $request->id_jurusan;

        $kelass = Kelas::where('jurusan_id', $id_jurusan)->get();

        foreach ($kelass as $kelas) {
            echo "<option value='$kelas->id'>$kelas->nama_kelas</option>";
        }
    }
}
