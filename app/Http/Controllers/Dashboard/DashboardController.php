<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\GuruBk;
use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PDF;

class DashboardController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all()->count();
        $siswas = Siswa::all()->count();
        $walikelass = WaliKelas::all()->count();
        $gurubks = GuruBk::all()->count();
        return view('admin.dashboard.index', [
            'jurusans' => $jurusans,
            'siswas' => $siswas,
            'walikelass' => $walikelass,
            'gurubks' => $gurubks,
        ]);
    }

    public function settingprofile(Request $request)
    {
        User::where('id', Auth()->user()->id)->update([
            'name' => $request->name,
            'telp' => $request->telp,
        ]);

        return redirect('/dashboard')->with('success', 'Profile berhasil di edit!');
    }

    public function settingemail(Request $request)
    {
        $validated = $request->validate([
            'old_email' => 'required',
            'email' => 'required|unique:users',
        ], [
            'email.required' => 'Email Address wajib diisi!.',
            'email.unique' => 'Email Address sudah digunakan',
        ]);

        if ($validated['old_email'] == $validated['email']) {
            return back()->with('error', 'Email Address sudah digunakan!');
        } else {

            User::where('id', Auth()->user()->id)->update([
                'email' => $validated['email'],
            ]);

            return redirect('/dashboard')->with('success', 'Data berhasil di edit!');
        }

    }

    public function settingpassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:4',
            'confirmpassword' => 'required|min:4',
        ]);

        // Pengecekan jika data yang dinputkan kosong atau tidak
        if (empty($validated)) {
            return back()->with('error', 'Data anda inputkan kosong!');
        } else {

            $password = $validated['password'];
            $confirmpassword = $validated['confirmpassword'];

            // Pengecekan jika password dan confirm password tidak cocok
            if ($password != $confirmpassword) {
                return back()->with('error', 'Password dan Konfirmasi tidak valid!!');
            } else {

                $passwords = Hash::make($validated['password']);

                $users = User::where('id', Auth()->user()->id)->update([
                    'password' => $passwords,
                    'duplicate' => $request->password,
                ]);
                return redirect('/dashboard')->with('success', 'Data berhasil di edit!');

            }

        }
    }

    public function settinggambar(Request $request)
    {

        $validated = $request->validate([
            'foto_profile' => 'required',
        ]);

        if (empty($validated)) {
            return back()->with('error', 'Data anda inputkan kosong!');
        } else {

            if (Auth()->user()->foto_profile) {
                Storage::delete(Auth()->user()->foto_profile);
            }

            if ($request->file('foto_profile')) {
                $validated['foto_profile'] = $request->file('foto_profile')->store('foto_profile');
            }

            User::where('id', Auth()->user()->id)->update([
                'foto_profile' => $validated['foto_profile'],
            ]);

            return redirect('/dashboard')->with('success', 'Data berhasil di edit!');

        }
    }

    public function hapusgambar(Request $request)
    {
        $vallidated = $request->validate([
            'oldPicture' => 'required',
        ]);

        if ($request->oldPicture) {
            $validated['oldPicture'] = Storage::delete($request->oldPicture);
        }
        User::where('id', Auth()->user()->id)->update([
            'foto_profile' => null,
        ]);

        return redirect('/dashboard')->with('success', 'Data berhasil di edit!');
    }

    public function generatepdfwalikelas()
    {

        $kelass = WaliKelas::where('id', Auth()->user()->walikelas_id)->first();

        $siswas = Siswa::where('kelas_id', $kelass->kelas_id)->latest()->get();

        $pdf = PDF::loadview('wali-kelas.export-pdf', ['siswas' => $siswas]);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream('Data-Siswa-pdf');
    }
}
