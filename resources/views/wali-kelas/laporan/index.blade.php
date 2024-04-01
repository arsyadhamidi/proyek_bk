@extends('admin.layout.master')
@section('menuLaporanWaliKelas', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('laporan-walikelas.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Tambahkan Laporan Siswa
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Wali Kelas</th>
                                <th>Guru BK</th>
                                <th>Siswa</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporans as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->walikelas->nama_walikelas ?? '-' }}</td>
                                    <td>{{ $data->gurubk->nama_gurubk ?? '-' }}</td>
                                    <td>{{ $data->siswa->nama_siswa ?? '-' }}</td>
                                    <td>
                                        @if ($data->status_laporan == 'Selesai')
                                            <span class="badge badge-success">{{ $data->status_laporan ?? '-' }}</span>
                                        @elseif ($data->status_laporan == 'Pengajuan')
                                            <span class="badge badge-warning">{{ $data->status_laporan ?? '-' }}</span>
                                        @else
                                            <span
                                                class="badge badge-secondary">{{ $data->status_laporan ?? 'Tidak Tersedia' }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $data->laporan_siswa ?? '-' }}</td>
                                    <td class="d-flex">
                                        @if ($data->status_laporan == 'Selesai')
                                            <button type="button" class="btn btn-sm bg-gradient-info" disabled>
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm bg-gradient-danger mx-2" disabled>
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        @elseif ($data->status_laporan == 'Pengajuan')
                                            <a href="{{ route('laporan-walikelas.edit', $data->id) }}"
                                                class="btn btn-sm bg-gradient-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('laporan-walikelas.destroy', $data->id) }}"
                                                method="POST"
                                                onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?');"
                                                class="mx-2">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm bg-gradient-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span
                                                class="badge badge-secondary">{{ $data->status_laporan ?? 'Tidak Tersedia' }}</span>
                                        @endif
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
