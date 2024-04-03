@extends('admin.layout.master')

@section('menuInputDataSiswa', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-primary">
                <div class="card-header">

                    @if (empty($siswas->users_id))
                        <a href="{{ route('biodata-siswa.create') }}" class="btn bg-gradient-primary">
                            <i class="fas fa-plus"></i>
                            Tambah Biodata Siswa
                        </a>
                    @else
                        <a href="{{ route('biodata-siswa.edit', Auth()->user()->id) }}" class="btn bg-gradient-primary">
                            <i class="fas fa-edit"></i>
                            Edit Biodata Siswa
                        </a>
                    @endif

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td width="30%">NISN</td>
                            <td width="3%">:</td>
                            <td>{{ $siswas->nisn_siswa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Nama Lengkap</td>
                            <td width="3%">:</td>
                            <td>{{ $siswas->nama_siswa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">TTL</td>
                            <td width="3%">:</td>
                            <td>{{ $siswas->tmp_lahir_siswa ?? '-' }} / {{ $siswas->tgl_lahir_siswa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Jenis Kelamin</td>
                            <td width="3%">:</td>
                            <td>{{ $siswas->jk_siswa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Jurusan</td>
                            <td width="3%">:</td>
                            <td>{{ $siswas->jurusan->nama_jurusan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Kelas</td>
                            <td width="3%">:</td>
                            <td>{{ $siswas->kelas->nama_kelas ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Telp Siswa</td>
                            <td width="3%">:</td>
                            <td>{{ $siswas->telp_siswa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Telp Ortu Siswa</td>
                            <td width="3%">:</td>
                            <td>{{ $siswas->telp_ortu_siswa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Email Address</td>
                            <td width="3%">:</td>
                            <td>{{ $siswas->email_siswa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Alamat Domisili</td>
                            <td width="3%">:</td>
                            <td>{{ $siswas->alamat_siswa ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
