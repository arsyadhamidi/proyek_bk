@extends('admin.layout.master')

@section('menuDataWaliKelas', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('data-walikelas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('data-walikelas.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>NIP Walikelas</label>
                                    <input type="text" name="nip_walikelas"
                                        class="form-control @error('nip_walikelas') is-invalid @enderror"
                                        value="{{ old('nip_walikelas') }}" placeholder="Masukan nip walikelas">
                                    @error('nip_walikelas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Nama Walikelas</label>
                                    <input type="text" name="nama_walikelas"
                                        class="form-control @error('nama_walikelas') is-invalid @enderror"
                                        value="{{ old('nama_walikelas') }}" placeholder="Masukan nama walikelas">
                                    @error('nama_walikelas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg">
                                <label>Jurusan</label>
                                <select name="jurusan_id" class="custom-select @error('jurusan_id') is-invalid @enderror"
                                    id="idJurusan">
                                    <option value="" selected>Pilih Jurusan</option>
                                    @foreach ($jurusans as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_jurusan ?? '-' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg">
                                <label>Kelas</label>
                                <select name="kelas_id" class="custom-select @error('kelas_id') is-invalid @enderror"
                                    id="idKelas">
                                    <option value="" selected>Pilih Kelas</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk_walikelas" value="Laki-Laki"
                                            checked>
                                        <label class="form-check-label">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk_walikelas"
                                            value="Perempuan">
                                        <label class="form-check-label">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                <label>Telp Wali Kelas</label>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <input type="text" name="first_telp" class="form-control" value="+62"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <input type="text" name="telp_walikelas"
                                                class="form-control @error('telp_walikelas') is-invalid @enderror"
                                                value="{{ old('telp_walikelas') }}" placeholder="Cth: 8229852XXXX">
                                            @error('telp_walikelas')
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
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Email Wali Kelas</label>
                                    <input type="email" name="email_walikelas"
                                        class="form-control @error('email_walikelas') is-invalid @enderror"
                                        placeholder="Masukan email guru bk" value="{{ old('email_walikelas') }}">
                                    @error('email_walikelas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Foto Wali Kelas</label>
                                    <input type="file" name="foto_walikelas" class="form-control">
                                </div>
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
                    url: "/jquery-jurusan",
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
