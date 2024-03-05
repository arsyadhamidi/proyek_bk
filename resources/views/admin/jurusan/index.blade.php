@extends('admin.layout.master')
@section('menuDataJurusan', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('data-jurusan.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Tambahkan Data Jurusan
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
                                    <td class="project-actions text-right">
                                        <form action="{{ route('data-jurusan.destroy', $data->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah anda yakin untuk menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('data-jurusan.edit', $data->id) }}"
                                                class="btn btn-sm bg-gradient-info">
                                                <i class="fas fa-pen"></i>
                                                Edit
                                            </a>
                                            <button type="submit" class="btn btn-sm bg-gradient-danger">
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
