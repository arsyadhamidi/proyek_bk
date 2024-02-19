@extends('admin.layout.master')
@section('menuDataSiswa', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('data-siswa.index') }}" class="btn bg-gradient-danger">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        Kembali
                    </a>
                    <a href="{{ route('data-siswa.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Tambahkan Data Siswa
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
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>JK</th>
                                <th>Telp</th>
                                <th>Aksi</th>
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
                                    <td>{{ $data->telp_siswa ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('data-siswa.edit', $data->id) }}"
                                            class="btn bg-gradient-success">
                                            <i class="fas fa-pen"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('data-siswa.destroy', $data->id) }}" method="POST"
                                            onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-gradient-danger">
                                                <i class="fas fa-trash-alt"></i>
                                                Hapus
                                            </button>
                                        </form>
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
