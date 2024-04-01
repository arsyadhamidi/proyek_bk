@extends('admin.layout.master')
@section('menuDataSiswa', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('data-siswa.index') }}" class="btn btn-default">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    <a href="{{ route('data-siswa.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Tambahkan Data Siswa
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>JK</th>
                                <th>Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nisn_siswa ?? '-' }}</td>
                                    <td>{{ $data->nama_siswa ?? '-' }}</td>
                                    <td>{{ $data->tmp_lahir_siswa ?? '-' }} / {{ $data->tgl_lahir_siswa ?? '-' }}</td>
                                    <td>{{ $data->jk_siswa ?? '-' }}</td>
                                    <td>{{ $data->telp_siswa ?? '-' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('data-siswa.edit', $data->id) }}"
                                            class="btn btn-sm bg-gradient-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('data-siswa.destroy', $data->id) }}" method="POST"
                                            class="mx-2" id="siswaForm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm bg-gradient-danger">
                                                <i class="fas fa-trash-alt"></i>
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
@push('custom-script')
    <script>
        // Mendengarkan acara pengiriman formulir
        document.getElementById('siswaForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir standar

            // Tampilkan SweetAlert saat formulir dikirim
            Swal.fire({
                icon: 'info',
                title: 'Hapus Data Siswa!',
                text: 'Apakah Anda yakin ingin untuk menghapus data ini?',
                showCancelButton: true, // Menampilkan tombol batal
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745', // Warna hijau untuk tombol konfirmasi
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#dc3545' // Warna merah untuk tombol pembatalan
            }).then((result) => {
                // Lanjutkan ke tindakan berikutnya, misalnya mengirimkan formulir
                if (result.isConfirmed) {
                    document.getElementById('siswaForm').submit(); // Melanjutkan pengiriman formulir
                }
            });
        });
    </script>
    @include('sweetalert::alert')
@endpush
