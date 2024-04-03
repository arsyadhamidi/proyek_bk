@extends('admin.layout.master')
@section('menuDataKelas', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="{{ route('data-kelas.index') }}" class="btn btn-default">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    <a href="{{ route('data-kelas.create', $jurusans->id) }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Tambahkan Data Kelas
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead class="bg-gradient-primary">
                            <th>No.</th>
                            <th>Nama Kelas</th>
                            <th>Aksi</th>
                        </thead>
                        @foreach ($kelass as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_kelas ?? '-' }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('data-kelas.edit', $data->id) }}" class="btn btn-sm bg-gradient-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('data-kelas.destroy', $data->id) }}" method="POST"
                                        id="kelasForm" class="mx-2">
                                        @csrf
                                        <input type="text" name="jurusan_id" class="form-control"
                                            value="{{ $data->jurusan_id }}" hidden>
                                        <button type="submit" class="btn btn-sm bg-gradient-danger">
                                            <i class="fas fa-trash-alt"></i>
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
@push('custom-script')
    <script>
        // Mendengarkan acara pengiriman formulir
        document.getElementById('kelasForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir standar

            // Tampilkan SweetAlert saat formulir dikirim
            Swal.fire({
                icon: 'info',
                title: 'Hapus Data Kelas!',
                text: 'Apakah Anda yakin ingin untuk menghapus data ini?',
                showCancelButton: true, // Menampilkan tombol batal
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745', // Warna hijau untuk tombol konfirmasi
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#dc3545' // Warna merah untuk tombol pembatalan
            }).then((result) => {
                // Lanjutkan ke tindakan berikutnya, misalnya mengirimkan formulir
                if (result.isConfirmed) {
                    document.getElementById('kelasForm').submit(); // Melanjutkan pengiriman formulir
                }
            });
        });
    </script>
    @include('sweetalert::alert')
@endpush
