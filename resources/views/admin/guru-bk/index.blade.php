@extends('admin.layout.master')
@section('menuDataGuruBk', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('data-gurubk.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Tambahkan Data Guru BK
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gurubks as $data)
                                <tr>
                                    <td width="3%">{{ $loop->iteration }}</td>
                                    <td>{{ $data->nip_gurubk ?? '-' }}</td>
                                    <td>{{ $data->nama_gurubk ?? '-' }}</td>
                                    <td>{{ $data->email_gurubk ?? '-' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('data-gurubk.edit', $data->id) }}"
                                            class="btn btn-sm bg-gradient-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('data-gurubk.destroy', $data->id) }}" method="POST"
                                            class="mx-2" id="gurubkForm">
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
        document.getElementById('gurubkForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir standar

            // Tampilkan SweetAlert saat formulir dikirim
            Swal.fire({
                icon: 'info',
                title: 'Hapus Data Guru BK!',
                text: 'Apakah Anda yakin ingin untuk menghapus data ini?',
                showCancelButton: true, // Menampilkan tombol batal
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745', // Warna hijau untuk tombol konfirmasi
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#dc3545' // Warna merah untuk tombol pembatalan
            }).then((result) => {
                // Lanjutkan ke tindakan berikutnya, misalnya mengirimkan formulir
                if (result.isConfirmed) {
                    document.getElementById('gurubkForm').submit(); // Melanjutkan pengiriman formulir
                }
            });
        });
    </script>
@endpush
