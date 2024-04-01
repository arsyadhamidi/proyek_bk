@extends('admin.layout.master')
@section('menuMelakukanBimbingan', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">

                    @php
                        $checkBimbingan = \App\Models\Bimbingan::where('siswa_id', Auth()->user()->siswa_id)
                            ->where('balasan_bimbingan', null)
                            ->latest()
                            ->first();

                    @endphp

                    @if ($checkBimbingan)
                        <button type="submit" class="btn bg-gradient-primary" disabled>
                            <i class="fas fa-plus"></i>
                            Mengajukan Bimbingan
                        </button>
                    @else
                        <a href="{{ route('mengajukan-bimbingan.create') }}" class="btn bg-gradient-primary">
                            <i class="fas fa-plus"></i>
                            Mengajukan Bimbingan
                        </a>
                    @endif
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
                                        <a href="{{ route('mengajukan-bimbingan.edit', $data->id) }}"
                                            class="btn btn-sm bg-gradient-info">
                                            <i class="fas fa-edit"></i>
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
