@extends('admin.layout.master')
@section('menuGuruBkLaporan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Data Laporan
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
                                                <button type="submit" class="btn bg-gradient-primary">
                                                    <i class="fas fa-check"></i>
                                                    Selesai
                                                </button>
                                            </form>
                                            <a href="https://api.whatsapp.com/send?phone={{ $data->siswa->telp_ortu_siswa ?? '-' }}&text=Halo%20orang%20tua,%20saya%20ingin%20berbicara%20tentang%20anak%20anda."
                                                class="btn bg-gradient-success" target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                                Panggilan Orang Tua
                                            </a>
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
