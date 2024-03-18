@extends('admin.layout.master')
@section('menuDataWaliKelas', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('data-walikelas.index') }}" class="btn btn-default">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    <a href="{{ route('data-walikelas.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Tambahkan Data Wali Kelas
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <th width="5%">No.</th>
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($walikelass as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->kelas->nama_kelas ?? '-' }}</td>
                                    <td>{{ $data->nama_walikelas ?? '-' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('data-walikelas.edit', $data->id) }}"
                                            class="btn btn-sm bg-gradient-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('data-walikelas.destroy', $data->id) }}" method="POST"
                                            id="walasForm" class="mx-2">
                                            @method('DELETE')
                                            @csrf
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
        document.getElementById('walasForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir standar

            // Tampilkan SweetAlert saat formulir dikirim
            Swal.fire({
                icon: 'info',
                title: 'Hapus Data Wali Kelas!',
                text: 'Apakah Anda yakin ingin untuk menghapus data ini?',
                showCancelButton: true, // Menampilkan tombol batal
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745', // Warna hijau untuk tombol konfirmasi
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#dc3545' // Warna merah untuk tombol pembatalan
            }).then((result) => {
                // Lanjutkan ke tindakan berikutnya, misalnya mengirimkan formulir
                if (result.isConfirmed) {
                    document.getElementById('walasForm').submit(); // Melanjutkan pengiriman formulir
                }
            });
        });
    </script>
@endpush
