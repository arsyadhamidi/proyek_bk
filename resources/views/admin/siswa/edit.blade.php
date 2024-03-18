@extends('admin.layout.master')
@section('menuDataSiswa', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('data-siswa.update', $siswas->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('data-siswa.show', $siswas->kelas_id) }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>NISN Siswa</label>
                                    <input type="text" name="nisn_siswa"
                                        class="form-control @error('nisn_siswa') is-invalid @enderror"
                                        placeholder="Masukan nisn siswa"
                                        value="{{ old('nisn_siswa', $siswas->nisn_siswa) }}">
                                    @error('nisn_siswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama_siswa"
                                        class="form-control @error('nama_siswa') is-invalid @enderror"
                                        placeholder="Masukan nama siswa"
                                        value="{{ old('nama_siswa', $siswas->nama_siswa) }}">
                                    @error('nama_siswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tmp_lahir_siswa"
                                                class="form-control @error('tmp_lahir_siswa') is-invalid @enderror"
                                                placeholder="Masukan tempat lahir"
                                                value="{{ old('tmp_lahir_siswa', $siswas->tmp_lahir_siswa) }}">
                                            @error('tmp_lahir_siswa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir_siswa"
                                                class="form-control @error('tgl_lahir_siswa') is-invalid @enderror"
                                                value="{{ old('tgl_lahir_siswa', $siswas->tgl_lahir_siswa) }}">
                                            @error('tgl_lahir_siswa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk_siswa" value="Laki-Laki"
                                            {{ $siswas->jk_siswa == 'Laki-Laki' ? 'checked' : '' }}>
                                        <label class="form-check-label">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk_siswa" value="Perempuan"
                                            {{ $siswas->jk_siswa == 'Perempuan' ? 'checked' : '' }}>
                                        <label class="form-check-label">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Agama Siswa</label>
                                    <select name="agama_siswa"
                                        class="custom-select @error('agama_siswa') is-invalid @enderror">
                                        <option value="" selected>Pilih Agama</option>
                                        <option value="Islam" {{ $siswas->agama_siswa == 'Islam' ? 'selected' : '' }}>
                                            Islam</option>
                                        <option value="Kristen" {{ $siswas->agama_siswa == 'Kristen' ? 'selected' : '' }}>
                                            Kristen</option>
                                        <option value="Khatoliq"
                                            {{ $siswas->agama_siswa == 'Khatoliq' ? 'selected' : '' }}>
                                            Khatoliq</option>
                                        <option value="Budha" {{ $siswas->agama_siswa == 'Budha' ? 'selected' : '' }}>
                                            Budha</option>
                                        <option value="Hindu" {{ $siswas->agama_siswa == 'Hindu' ? 'selected' : '' }}>
                                            Hindu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">

                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Telp Siswa</label>
                                            <input type="text" name="telp_siswa"
                                                class="form-control @error('telp_siswa') is-invalid @enderror"
                                                placeholder="Masukan telepon siswa"
                                                value="{{ old('telp_siswa', $siswas->telp_siswa) }}">
                                            @error('telp_siswa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Telp Orang Tua</label>
                                            <input type="text" name="telp_ortu_siswa"
                                                class="form-control @error('telp_ortu_siswa') is-invalid @enderror"
                                                placeholder="Masukan telepon ortu siswa"
                                                value="{{ old('telp_ortu_siswa', $siswas->telp_ortu_siswa) }}">
                                            @error('telp_ortu_siswa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Alamat Email</label>
                                    <input type="email" name="email_siswa"
                                        class="form-control @error('email_siswa') is-invalid @enderror"
                                        placeholder="Masukan alamat email"
                                        value="{{ old('email_siswa', $siswas->email_siswa) }}">
                                    @error('email_siswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Alamat Domisili</label>
                                    <input type="text" name="alamat_siswa"
                                        class="form-control @error('alamat_siswa') is-invalid @enderror"
                                        placeholder="Masukan tempat lahir"
                                        value="{{ old('alamat_siswa', $siswas->alamat_siswa) }}">
                                    @error('alamat_siswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Jurusan</label>
                                    <select name="jurusan_id"
                                        class="custom-select @error('jurusan_id') is-invalid @enderror" id="idJurusan">
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
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Kelas</label>
                                    <select name="kelas_id" class="custom-select @error('kelas_id') is-invalid @enderror"
                                        id="idKelas">
                                        <option value="" selected>Pilih Kelas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" name="tgl_masuk_siswa"
                                        class="form-control @error('tgl_masuk_siswa') is-invalid @enderror"
                                        value="{{ old('tgl_masuk_siswa', $siswas->tgl_masuk_siswa) }}">
                                    @error('tgl_masuk_siswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Tanggal Kelulusan</label>
                                    <input type="date" name="tgl_lulus_siswa"
                                        class="form-control @error('tgl_lulus_siswa') is-invalid @enderror"
                                        value="{{ old('tgl_lulus_siswa', $siswas->tgl_lulus_siswa) }}">
                                    @error('tgl_lulus_siswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Nilai Siswa</label>
                                    <input type="text" name="nilai_siswa"
                                        class="form-control @error('nilai_siswa') is-invalid @enderror"
                                        value="{{ old('nilai_siswa', $siswas->nilai_siswa) }}" placeholder="Optional">
                                    @error('nilai_siswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Keterangan</label>
                            <textarea name="keterangan_siswa" rows="5"
                                class="form-control @error('keterangan_siswa') is-invalid @enderror" placeholder="Optional">{{ old('keterangan_siswa', $siswas->keterangan_siswa) }}</textarea>
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
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#idJurusan').on('change', function() {
                let id_jurusan = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: "/jquery-siswa",
                    data: {
                        id_jurusan: id_jurusan
                    },
                    cache: false,
                    success: function(data) {
                        $('#idKelas').html(data);
                    },
                    error: function(data) {
                        console.log('error: ', data);
                    }
                });
            });
        });
    </script>
@endpush
