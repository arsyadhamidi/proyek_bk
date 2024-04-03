<?php

namespace App\Http\Controllers\Registrasi;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('registrasi', [
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'telp' => 'required',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'email.required' => 'Alamat Email wajib diisi',
            'email.unique' => 'Alamat Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'telp.required' => 'Nomor Telepon wajib diisi',
        ]);

        $validated['level'] = 'Siswa';
        $validated['password'] = bcrypt($request->password);
        $validated['duplicate'] = $request->password;

        User::create($validated);

        return redirect('/login')->with('success', 'Anda berhasil melakukan registrasi');
    }

    public function getKelasByJurusan(Request $request)
    {
        $jurusanId = $request->input('jurusan_id');

        // Mengambil kelas berdasarkan id jurusan yang dipilih
        $kelas = Kelas::where('jurusan_id', $jurusanId)->get();

        return response()->json($kelas);
    }
}
