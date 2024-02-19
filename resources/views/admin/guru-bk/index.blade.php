@extends('admin.layout.master')
@section('menuDataGuruBk', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('data-gurubk.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Tambahkan Data Guru BK
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
                                <th>NIP</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gurubks as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nip_gurubk ?? '-' }}</td>
                                    <td>{{ $data->nama_gurubk ?? '-' }}</td>
                                    <td>{{ $data->jk_gurubk ?? '-' }}</td>
                                    <td>{{ $data->telp_gurubk ?? '-' }}</td>
                                    <td>{{ $data->email_gurubk ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('data-gurubk.edit', $data->id) }}"
                                            class="btn bg-gradient-success">
                                            <i class="fas fa-pen"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('data-gurubk.destroy', $data->id) }}" method="POST"
                                            onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')">
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
