@extends('admin.layout.master')
@section('menuDataWaliKelas', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('data-walikelas.index') }}" class="btn bg-gradient-secondary">
                        <i class="fas fa-arrow-circle-left"></i>
                        Kembali
                    </a>
                    <a href="{{ route('data-walikelas.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Tambahkan Data Wali Kelas
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
                            <th width="5%">No.</th>
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($walikelass as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->kelas->nama_kelas ?? '-' }}</td>
                                    <td>{{ $data->nama_walikelas ?? '-' }}</td>
                                    <td class="project-action text-right">
                                        <form action="{{ route('data-walikelas.destroy', $data->id) }}" method="POST"
                                            onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('data-walikelas.edit', $data->id) }}"
                                                class="btn btn-sm bg-gradient-success">
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
