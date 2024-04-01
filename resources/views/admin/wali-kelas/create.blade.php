@extends('admin.layout.master')

@section('menuDataWaliKelas', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('data-walikelas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('data-walikelas.show', $kelass->id) }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="row mb-3">
                            <div class="col-lg">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan_id" class="form-control"
                                    value="{{ $kelass->jurusan_id }}" hidden>
                                <input type="text" class="form-control"
                                    value="{{ $kelass->jurusan->nama_jurusan ?? '-' }}" readonly>
                            </div>
                            <div class="col-lg">
                                <label>Kelas</label>
                                <input type="text" name="kelas_id" class="form-control" value="{{ $kelass->id }}"
                                    hidden>
                                <input type="text" class="form-control" value="{{ $kelass->nama_kelas ?? '-' }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>
                                        NIP / Kode Walikelas
                                        <span class="text-danger">*</span>
                                    </label>
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
                                    <label>
                                        Nama Walikelas
                                        <span class="text-danger">*</span>
                                    </label>
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
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label>
                                            Jenis Kelamin
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="jk_walikelas"
                                            class="form-control @error('jk_walikelas') is-invalid @enderror"
                                            style="width: 100%;" id="selectTambah">
                                            <option value="" selected>Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">
                                                Laki-Laki</option>
                                            <option value="Perempuan">
                                                Perempuan</option>
                                        </select>
                                        @error('jk_walikelas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>
                                        Telp Wali Kelas
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="telp_walikelas"
                                        class="form-control @error('telp_walikelas') is-invalid @enderror"
                                        value="{{ old('telp_walikelas') }}" placeholder="Masukan nomor telepon">
                                    @error('telp_walikelas')
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
                                    <label>
                                        Email Wali Kelas
                                        <span class="text-danger">*</span>
                                    </label>
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
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Foto Wali Kelas</label><br>
                                    <img src="{{ asset('images/foto-profile.png') }}" class="img-preview mb-3"
                                        width="150" height="150">
                                    <div class="custom-file">
                                        <input type="file" name="foto_walikelas" class="custom-file-input"
                                            id="customFile" onchange="previewImage()">
                                        <label class="custom-file-label" for="customFile">Choose
                                            file</label>
                                    </div>
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
        $(document).ready(function() {

            $('#selectTambah').select2({
                theme: 'bootstrap4',
            });

        });
    </script>
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
