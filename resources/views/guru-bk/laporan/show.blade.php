@extends('admin.layout.master')
@section('menuGuruBkLaporan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="{{ route('gurubk-laporan.index') }}" class="btn btn-default">
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
                        <thead class="bg-gradient-primary">
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
                                            <button type="submit" class="btn btn-sm bg-gradient-success" disabled>
                                                <i class="fas fa-check"></i>
                                                Selesai
                                            </button>
                                        @elseif ($data->status_laporan == 'Pengajuan')
                                            <form action="{{ route('gurubk-laporan.update', $data->id) }}" method="POST"
                                                id="laporanForm">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-sm bg-gradient-success">
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
@push('custom-script')
    <script>
        // Mendengarkan acara pengiriman formulir
        document.getElementById('laporanForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir standar

            // Tampilkan SweetAlert saat formulir dikirim
            Swal.fire({
                icon: 'info',
                title: 'Laporan Wali Kelas!',
                text: 'Apakah laporan ini sudah selesai?',
                showCancelButton: true, // Menampilkan tombol batal
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745', // Warna hijau untuk tombol konfirmasi
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#dc3545' // Warna merah untuk tombol pembatalan
            }).then((result) => {
                // Lanjutkan ke tindakan berikutnya, misalnya mengirimkan formulir
                if (result.isConfirmed) {
                    document.getElementById('laporanForm').submit(); // Melanjutkan pengiriman formulir
                }
            });
        });
    </script>
@endpush
