@extends('admin.layout.master')
@section('menuDataKelas', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Data Kelas
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
                            <th>No.</th>
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($jurusans as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->kode_jurusan ?? '-' }}</td>
                                    <td>{{ $data->nama_jurusan ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('data-kelas.show', $data->id) }}" class="btn bg-gradient-primary">
                                            <i class="fas fa-eye"></i>
                                            Lihat
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
