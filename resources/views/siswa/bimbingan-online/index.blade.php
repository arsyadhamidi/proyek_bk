@extends('admin.layout.master')

@section('menuSiswaBimbinganOnline', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('bimbingan-online.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Lakukan Bimbingan
                    </a>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session('error') }}
                        </div>
                    @elseif (session('success'))
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Guru BK</th>
                                <th>Layanan</th>
                                <th>Bimbingan</th>
                                <th>Balasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bimbingans as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->gurubk->nama_gurubk ?? '-' }}</td>
                                    <td>{{ $data->layanan_online ?? '-' }}</td>
                                    <td>{{ $data->keterangan_online ?? '-' }}</td>
                                    <td>{{ $data->balasan_online ?? '-' }}</td>
                                    <td class="d-flex">
                                        @if ($data->balasan_online != null)
                                            <button type="button" class="btn btn-sm bg-gradient-success" type="submit"
                                                disabled>
                                                Selesai
                                            </button>
                                        @else
                                            <a href="{{ route('bimbingan-online.edit', $data->id) }}"
                                                class="btn btn-sm bg-gradient-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('bimbingan-online.destroy', $data->id) }}" method="POST"
                                                id="bimbinganForm" class="mx-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm bg-gradient-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
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
        document.getElementById('bimbinganForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir standar

            // Tampilkan SweetAlert saat formulir dikirim
            Swal.fire({
                icon: 'info',
                title: 'Hapus Bimbingan Online!',
                text: 'Apakah Anda yakin ingin untuk menghapus data ini?',
                showCancelButton: true, // Menampilkan tombol batal
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745', // Warna hijau untuk tombol konfirmasi
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#dc3545' // Warna merah untuk tombol pembatalan
            }).then((result) => {
                // Lanjutkan ke tindakan berikutnya, misalnya mengirimkan formulir
                if (result.isConfirmed) {
                    document.getElementById('bimbinganForm').submit(); // Melanjutkan pengiriman formulir
                }
            });
        });
    </script>
@endpush
