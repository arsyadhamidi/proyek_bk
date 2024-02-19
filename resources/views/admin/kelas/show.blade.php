@extends('admin.layout.master')
@section('menuDataKelas', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('data-kelas.index') }}" class="btn bg-gradient-danger">
                        <i class="fas fa-arrow-circle-left"></i>
                        Kembali
                    </a>
                    <a href="{{ route('data-kelas.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Tambahkan Data Kelas
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <th>No.</th>
                            <th>Nama Kelas</th>
                            <th>Aksi</th>
                        </thead>
                        @foreach ($kelass as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_kelas ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('data-kelas.edit', $data->id) }}" class="btn bg-gradient-primary">
                                        <i class="fas fa-pen"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('data-kelas.destroy', $data->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah anda yakin untuk menghapus data ini?')">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn bg-gradient-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
