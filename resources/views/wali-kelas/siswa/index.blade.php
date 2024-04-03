@extends('admin.layout.master')

@section('menuSiswaWaliKelas', 'active')

@section('content')
    @php
        $walikelas = App\Models\WaliKelas::where('id', Auth()->user()->walikelas_id)->first();
        $kelasId = $walikelas->kelas_id;
        $siswas = App\Models\Siswa::where('kelas_id', $kelasId)->latest()->get();
    @endphp

    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    Data Siswa - {{ $walikelas->jurusan->nama_jurusan ?? '-' }} /
                    {{ $walikelas->kelas->nama_kelas ?? '-' }}
                    <a href="/generate-pdf/siswa" class="btn bg-gradient-danger" target="_blank">
                        <i class="fas fa-print"></i>
                        Download Data Siswa
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead class="bg-gradient-primary">
                            <tr>
                                <th>No.</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nisn_siswa ?? '-' }}</td>
                                    <td>{{ $data->nama_siswa ?? '-' }}</td>
                                    <td>{{ $data->tmp_lahir_siswa ?? '-' }} / {{ $data->tgl_lahir_siswa ?? '-' }}</td>
                                    <td>{{ $data->jk_siswa ?? '-' }}</td>
                                    <td>{{ $data->jurusan->nama_jurusan ?? '-' }}</td>
                                    <td>{{ $data->kelas->nama_kelas ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
