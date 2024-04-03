@extends('admin.layout.master')
@section('menuGuruBkBimbinganOnline', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    Bimbingan Online
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead class="bg-gradient-primary">
                            <tr>
                                <th>No.</th>
                                <th>Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $data)
                                @php
                                    $countsPesan = \App\Models\BimbinganOnline::where('siswa_id', $data->id)
                                        ->whereNull('countpesan')
                                        ->count();
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_siswa ?? '-' }}</td>
                                    <td>{{ $data->jk_siswa ?? '-' }}</td>
                                    <td>{{ $data->email_siswa }}</td>
                                    <td>{{ $data->telp_siswa }}</td>
                                    <td>
                                        <span class="badge bg-warning">
                                            {{ $countsPesan ?? '0' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('layanan-online.show', $data->id) }}"
                                            class="btn btn-sm bg-gradient-success">
                                            <i class="fas fa-comments"></i>
                                            Chatt
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
