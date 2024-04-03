@extends('admin.layout.master')
@section('menuInputDataSiswa', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('biodata-siswa.store') }}" method="POST">
                @csrf
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <a href="{{ route('biodata-siswa.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                NISN Siswa
                            </div>
                            <div class="col-lg-1">
                                :
                            </div>
                            <div class="col-lg">
                                <input type="text" name="nisn_siswa"
                                    class="form-control @error('nisn_siswa') is-invalid @enderror"
                                    placeholder="Masukan nisn siswa" value="{{ old('nisn_siswa') }}">
                                @error('nisn_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                Nama Siswa
                            </div>
                            <div class="col-lg-1">
                                :
                            </div>
                            <div class="col-lg">
                                <input type="text" name="nama_siswa"
                                    class="form-control @error('nama_siswa') is-invalid @enderror"
                                    placeholder="Masukan nama siswa" value="{{ old('nama_siswa') }}">
                                @error('nama_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                Tempat Lahir
                            </div>
                            <div class="col-lg-1">
                                :
                            </div>
                            <div class="col-lg">
                                <input type="text" name="tmp_lahir_siswa"
                                    class="form-control @error('tmp_lahir_siswa') is-invalid @enderror"
                                    placeholder="Masukan tempat lahir" value="{{ old('tmp_lahir_siswa') }}">
                                @error('tmp_lahir_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                Tanggal Lahir
                            </div>
                            <div class="col-lg-1">
                                :
                            </div>
                            <div class="col-lg">
                                <input type="date" name="tgl_lahir_siswa"
                                    class="form-control @error('tgl_lahir_siswa') is-invalid @enderror"
                                    value="{{ old('tgl_lahir_siswa') }}">
                                @error('tgl_lahir_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                Jenis Kelamin
                            </div>
                            <div class="col-lg-1">
                                :
                            </div>
                            <div class="col-lg">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk_siswa" value="Laki-Laki"
                                        checked>
                                    <label class="form-check-label">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk_siswa" value="Perempuan">
                                    <label class="form-check-label">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                Telp / WA Siswa
                            </div>
                            <div class="col-lg-1">
                                :
                            </div>
                            <div class="col-lg">
                                <input type="text" name="telp_siswa"
                                    class="form-control @error('telp_siswa') is-invalid @enderror"
                                    placeholder="Masukan nomor telepon" value="{{ old('telp_siswa') }}">
                                @error('telp_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                Telp Orang Tua Siswa
                            </div>
                            <div class="col-lg-1">
                                :
                            </div>
                            <div class="col-lg">
                                <input type="text" name="telp_ortu_siswa"
                                    class="form-control @error('telp_ortu_siswa') is-invalid @enderror"
                                    placeholder="Masukan nomor telepon" value="{{ old('telp_ortu_siswa') }}">
                                @error('telp_ortu_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                Alamat Email
                            </div>
                            <div class="col-lg-1">
                                :
                            </div>
                            <div class="col-lg">
                                <input type="text" name="email_siswa"
                                    class="form-control @error('email_siswa') is-invalid @enderror"
                                    placeholder="Masukan alamat email" value="{{ old('email_siswa') }}">
                                @error('email_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                Jurusan
                            </div>
                            <div class="col-lg-1">
                                :
                            </div>
                            <div class="col-lg">
                                <select name="jurusan_id" class="form-control @error('jurusan_id') is-invalid @enderror"
                                    id="jurusanId" style="width: 100%;">
                                    <option value="" selected>Pilih Jurusan</option>
                                    @foreach ($jurusans as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_jurusan ?? '-' }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                Kelas
                            </div>
                            <div class="col-lg-1">
                                :
                            </div>
                            <div class="col-lg">
                                <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror"
                                    id="kelasId">
                                    <option value="" selected>Pilih Kelas</option>
                                </select>
                                @error('kelas_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                Alamat Domisili
                            </div>
                            <div class="col-lg-1">
                                :
                            </div>
                            <div class="col-lg">
                                <textarea name="alamat_siswa" class="form-control @error('alamat_siswa') is-invalid @enderror" rows="4"
                                    placeholder="Masukan alamat domisili">{{ old('alamat_siswa') }}</textarea>
                                @error('alamat_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn bg-gradient-success">
                            <i class="fas fa-save"></i>
                            Simpan Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('custom-script')
    <script>
        $(document).ready(function() {
            $('#jurusanId').select2({
                theme: 'bootstrap4',
            });

            $('#kelasId').select2({
                theme: 'bootstrap4',
            });
        });
    </script>

    <script>
        $('#jurusanId').change(function() {
            var selectedJurusan = $(this).val();
            $.ajax({
                url: '/getjurusanbysiswa',
                type: 'GET',
                data: {
                    selectedJurusan: selectedJurusan
                },
                success: function(response) {
                    $('#kelasId').empty().append(response
                        .options); // inisialisasi kembali Select2 setelah mengisi opsi
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    // Tambahkan logika penanganan kesalahan di sini, seperti menampilkan pesan kesalahan kepada pengguna
                }
            });
        });
    </script>
@endpush
