@extends('admin.layout.master')

@section('menuBimbinganSiswa', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('bimbingan-siswa.create') }}" class="btn bg-gradient-primary">
                        Rekap Data Bimbingan Siswa
                    </a>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session('error') }}
                        </div>
                    @elseif (session('success'))
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Guru BK</th>
                                <th>Jadwal</th>
                                <th>Layanan</th>
                                <th>Keterangan</th>
                                <th>Balasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bimbingans as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->gurubk->nama_gurubk ?? '-' }}</td>
                                    <td>
                                        {{ $data->jadwal->hari_jadwal ?? '-' }} /
                                        {{ $data->jadwal->jam_mulai_bimbingan ?? '-' }} -
                                        {{ $data->jadwal->jam_selesai_bimbingan ?? '-' }}
                                    </td>
                                    <td>{{ $data->status_bimbingan ?? '-' }}</td>
                                    <td>
                                        {{ $data->keterangan_bimbingan ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $data->balasan_bimbingan ?? '-' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('bimbingan-siswa.edit', $data->id) }}"
                                            class="btn bg-gradient-success">
                                            Balasan
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
