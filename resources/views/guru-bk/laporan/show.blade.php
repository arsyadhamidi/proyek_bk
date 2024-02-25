@extends('admin.layout.master')
@section('menuGuruBkLaporan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('gurubk-laporan.index') }}" class="btn bg-gradient-secondary">
                        Kembali
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
                                <th>Siswa</th>
                                <th>Laporan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporans as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->walikelas->nama_walikelas ?? '-' }}</td>
                                    <td>{{ $data->siswa->nama_siswa ?? '-' }}</td>
                                    <td>{{ $data->laporan_siswa ?? '-' }}</td>
                                    <td>{{ $data->status_laporan ?? '-' }}</td>
                                    <td>
                                        @if ($data->status_laporan == 'Selesai')
                                            <button type="submit" class="btn bg-gradient-success" disabled>
                                                <i class="fas fa-check"></i>
                                                Selesai
                                            </button>
                                        @elseif ($data->status_laporan == 'Pengajuan')
                                            <form action="{{ route('gurubk-laporan.update', $data->id) }}" method="POST"
                                                onclick="return confirm('Apakah laporan ini sudah selesai ?');">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn bg-gradient-success">
                                                    <i class="fas fa-check"></i>
                                                    Selesai
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
