@extends('admin.layout.master')
@section('menuJadwalBimbingan', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('buat-jadwal.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Buat Jadwal Bimbingan
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Hari</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwals as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->hari_jadwal ?? '-' }}</td>
                                    <td>{{ $data->jam_mulai_bimbingan ?? '-' }}</td>
                                    <td>{{ $data->jam_selesai_bimbingan ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('buat-jadwal.edit', $data->id) }}"
                                            class="btn bg-gradient-success">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('buat-jadwal.destroy', $data->id) }}" method="POST"
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
