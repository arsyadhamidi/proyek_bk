@extends('admin.layout.master')
@section('menuJadwalBimbingan', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="{{ route('buat-jadwal.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Buat Jadwal Bimbingan
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead class="bg-gradient-primary">
                            <tr>
                                <th>No.</th>
                                <th>Hari</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwals as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->hari_jadwal ?? '-' }}</td>
                                    <td>
                                        {{ $data->jam_mulai_bimbingan ? date('H.i', strtotime($data->jam_mulai_bimbingan)) : '-' }}
                                        WIB
                                    </td>
                                    <td>
                                        {{ $data->jam_selesai_bimbingan ? date('H.i', strtotime($data->jam_selesai_bimbingan)) : '-' }}
                                        WIB
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('buat-jadwal.edit', $data->id) }}"
                                            class="btn btn-sm bg-gradient-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('buat-jadwal.destroy', $data->id) }}" method="POST"
                                            id="jadwalForm" class="mx-2">
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
        document.getElementById('jadwalForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir standar

            // Tampilkan SweetAlert saat formulir dikirim
            Swal.fire({
                icon: 'info',
                title: 'Hapus Jadwal Bimbingan!',
                text: 'Apakah Anda yakin ingin untuk menghapus data ini?',
                showCancelButton: true, // Menampilkan tombol batal
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745', // Warna hijau untuk tombol konfirmasi
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#dc3545' // Warna merah untuk tombol pembatalan
            }).then((result) => {
                // Lanjutkan ke tindakan berikutnya, misalnya mengirimkan formulir
                if (result.isConfirmed) {
                    document.getElementById('jadwalForm').submit(); // Melanjutkan pengiriman formulir
                }
            });
        });
    </script>
@endpush
