@extends('admin.layout.master')
@section('menuGuruBkLaporan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-primary">
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
                        <thead class="bg-gradient-primary">
                            <tr>
                                <th>No.</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Siswa</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nisn_siswa ?? '-' }}</td>
                                    <td>{{ $data->nama_siswa ?? '-' }}</td>
                                    <td>{{ $data->jurusan->nama_jurusan ?? '-' }}</td>
                                    <td>{{ $data->kelas->nama_kelas ?? '-' }}</td>
                                    <td>
                                        @php
                                            $laporans = App\Models\Laporan::where('siswa_id', $data->id)
                                                ->where('status_laporan', 'Selesai')
                                                ->count();
                                        @endphp

                                        {{ $laporans ?? '0' }} Status
                                    </td>
                                    <td>
                                        @if ($laporans >= 3)
                                            <a href="https://api.whatsapp.com/send?phone={{ $data->siswa->telp_ortu_siswa ?? '-' }}&text=Halo%20orang%20tua,%20saya%20ingin%20berbicara%20tentang%20anak%20anda."
                                                class="btn btn-sm bg-gradient-success" target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                                Panggilan Orang Tua
                                            </a>
                                        @else
                                            <a href="{{ route('gurubk-laporan.show', $data->id) }}"
                                                class="btn btn-sm bg-gradient-info">
                                                <i class="fas fa-eye"></i>
                                                Detail
                                            </a>
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
