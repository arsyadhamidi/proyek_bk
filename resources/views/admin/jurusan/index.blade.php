@extends('admin.layout.master')
@section('menuDataJurusan', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('data-jurusan.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Tambahkan Data Jurusan
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <th>No.</th>
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($jurusans as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->kode_jurusan ?? '-' }}</td>
                                    <td>{{ $data->nama_jurusan ?? '-' }}</td>
                                    <td class="d-flex">
                                        <form action="{{ route('data-jurusan.destroy', $data->id) }}" method="POST"
                                            id="jurusanForm">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('data-jurusan.edit', $data->id) }}"
                                                class="btn btn-sm bg-gradient-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
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
        document.getElementById('jurusanForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir standar

            // Tampilkan SweetAlert saat formulir dikirim
            Swal.fire({
                icon: 'info',
                title: 'Hapus Data Jurusan!',
                text: 'Apakah Anda yakin ingin untuk menghapus data ini?',
                showCancelButton: true, // Menampilkan tombol batal
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745', // Warna hijau untuk tombol konfirmasi
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#dc3545' // Warna merah untuk tombol pembatalan
            }).then((result) => {
                // Lanjutkan ke tindakan berikutnya, misalnya mengirimkan formulir
                if (result.isConfirmed) {
                    document.getElementById('jurusanForm').submit(); // Melanjutkan pengiriman formulir
                }
            });
        });
    </script>
@endpush
