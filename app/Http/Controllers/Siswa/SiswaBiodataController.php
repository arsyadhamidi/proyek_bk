<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaBiodataController extends Controller
{
    public function index()
    {
        return view('siswa.biodata-siswa.index', [
            'siswas' => Siswa::where('users_id', Auth()->user()->id)->first(),
        ]);
    }

    public function create()
    {
        return view('siswa.biodata-siswa.create', [
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn_siswa' => 'required',
            'nama_siswa' => 'required',
            'jk_siswa' => 'required',
            'tmp_lahir_siswa' => 'required',
            'tgl_lahir_siswa' => 'required',
            'alamat_siswa' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'telp_siswa' => 'required',
            'telp_ortu_siswa' => 'required',
            'email_siswa' => 'required',
        ], [
            'nisn_siswa.required' => 'NISN Siswa wajib diisi',
            'nama_siswa.required' => 'Nama Siswa wajib diisi',
            'jk_siswa.required' => 'Jenis Kelamin Siswa wajib diisi',
            'tmp_lahir_siswa.required' => 'Tempat Lahir Siswa wajib diisi',
            'tgl_lahir_siswa.required' => 'Tanggal Lahir Siswa wajib diisi',
            'alamat_siswa.required' => 'Alamat Domisili wajib diisi',
            'jurusan_id.required' => 'Jurusan wajib diisi',
            'kelas_id.required' => 'Kelas wajib diisi',
            'telp_siswa.required' => 'Telepon Siswa wajib diisi',
            'telp_ortu_siswa.required' => 'Telepon Orang Tua Siswa wajib diisi',
            'email_siswa.required' => 'Alamat Email Siswa wajib diisi',
        ]);

        $validated['users_id'] = Auth()->user()->id;

        Siswa::create($validated);

        return redirect('/biodata-siswa')->with('success', 'Anda berhasil menginputkan biodata diri anda');
    }

    public function edit($id)
    {
        return view('siswa.biodata-siswa.edit', [
            'siswas' => Siswa::where('users_id', $id)->first(),
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nisn_siswa' => 'required',
            'nama_siswa' => 'required',
            'jk_siswa' => 'required',
            'tmp_lahir_siswa' => 'required',
            'tgl_lahir_siswa' => 'required',
            'alamat_siswa' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'telp_siswa' => 'required',
            'telp_ortu_siswa' => 'required',
            'email_siswa' => 'required',
        ], [
            'nisn_siswa.required' => 'NISN Siswa wajib diisi',
            'nama_siswa.required' => 'Nama Siswa wajib diisi',
            'jk_siswa.required' => 'Jenis Kelamin Siswa wajib diisi',
            'tmp_lahir_siswa.required' => 'Tempat Lahir Siswa wajib diisi',
            'tgl_lahir_siswa.required' => 'Tanggal Lahir Siswa wajib diisi',
            'alamat_siswa.required' => 'Alamat Domisili wajib diisi',
            'jurusan_id.required' => 'Jurusan wajib diisi',
            'kelas_id.required' => 'Kelas wajib diisi',
            'telp_siswa.required' => 'Telepon Siswa wajib diisi',
            'telp_ortu_siswa.required' => 'Telepon Orang Tua Siswa wajib diisi',
            'email_siswa.required' => 'Alamat Email Siswa wajib diisi',
        ]);

        $validated['users_id'] = Auth()->user()->id;

        Siswa::where('users_id', $id)->update($validated);

        return redirect('/biodata-siswa')->with('success', 'Anda berhasil mengupdate biodata diri anda');
    }

    public function getJurusanBySiswa(Request $request)
    {
        $selectedJurusan = $request->selectedJurusan;

        $kelass = Kelas::where('jurusan_id', $selectedJurusan)->get();

        $options = '';
        $options = '<option selected>Pilih Kelas</option>';
        foreach ($kelass as $data) {
            $options .= "<option value='$data->id'>$data->nama_kelas</option>";
        }

        return response()->json(['options' => $options]);
    }
}
