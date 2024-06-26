@extends('admin.layout.master')
@section('menuDataSiswa', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="{{ route('data-siswa.index') }}" class="btn btn-default">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead class="bg-gradient-primary">
                            <th>No.</th>
                            <th>Nama Kelas</th>
                            <th>Aksi</th>
                        </thead>
                        @foreach ($kelass as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_kelas ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('data-siswa.show', $data->id) }}"
                                        class="btn btn-sm bg-gradient-primary">
                                        <i class="fas fa-eye"></i>
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
