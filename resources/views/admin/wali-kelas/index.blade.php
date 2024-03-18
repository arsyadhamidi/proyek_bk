@extends('admin.layout.master')
@section('menuDataWaliKelas', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Data Wali Kelas
                </div>
                <div class="card-body">
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
                                        <a href="{{ route('data-walikelas.show', $data->id) }}"
                                            class="btn btn-sm bg-gradient-primary">
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
