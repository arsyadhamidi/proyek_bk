@extends('admin.layout.master')

@section('menuBimbinganSiswa', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="{{ route('bimbingan-siswa.index') }}" class="btn btn-default">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    <a href="{{ route('bimbingan-siswa.show', Auth()->user()->gurubk_id) }}" class="btn bg-gradient-danger"
                        target="_blank">
                        <i class="fas fa-print"></i>
                        Download Rekap Data Siswa Bimbingan
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead class="bg-gradient-primary">
                            <tr>
                                <th>No.</th>
                                <th>Guru BK</th>
                                <th>Jadwal</th>
                                <th>Layanan</th>
                                <th>Keterangan</th>
                                <th>Balasan</th>
                                <th>Tanggal</th>
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
                                        {!! $data->keterangan_bimbingan ?? '-' !!}
                                    </td>
                                    <td>
                                        {!! $data->balasan_bimbingan ?? '-' !!}
                                    </td>
                                    <td>
                                        {{ $data->tgl_bimbingan ?? '-' }}
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
