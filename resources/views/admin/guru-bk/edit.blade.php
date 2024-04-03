@extends('admin.layout.master')
@section('menuDataGuruBk', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('data-gurubk.update', $gurubks->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('data-gurubk.index') }}" class="btn btn-default">
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
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>NIP / Kode Guru BK</label>
                                    <input type="text" name="nip_gurubk"
                                        class="form-control @error('nip_gurubk') is-invalid @enderror"
                                        placeholder="Masukan nip guru bk"
                                        value="{{ old('nip_gurubk', $gurubks->nip_gurubk) }}">
                                    @error('nip_gurubk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Nama Guru BK</label>
                                    <input type="text" name="nama_gurubk"
                                        class="form-control @error('nama_gurubk') is-invalid @enderror"
                                        placeholder="Masukan nama guru bk"
                                        value="{{ old('nama_gurubk', $gurubks->nama_gurubk) }}">
                                    @error('nama_gurubk')
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
                                    <label>Jenis Kelamin</label>
                                    <select name="jk_gurubk" class="form-control @error('jk_gurubk') is-invalid @enderror"
                                        style="width: 100%;" id="selectTambah">
                                        <option value="" selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki"
                                            {{ $gurubks->jk_gurubk == 'Laki-Laki' ? 'selected' : '' }}>
                                            Laki-Laki</option>
                                        <option value="Perempuan"
                                            {{ $gurubks->jk_gurubk == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('jk_gurubk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Telp Wali Kelas</label>
                                    <input type="text" name="telp_gurubk"
                                        class="form-control @error('telp_gurubk') is-invalid @enderror"
                                        value="{{ old('telp_gurubk', $gurubks->telp_gurubk) }}"
                                        placeholder="Masukan nomor telepon">
                                    @error('telp_gurubk')
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
                                    <label>Email Guru Bk</label>
                                    <input type="email" name="email_gurubk"
                                        class="form-control @error('email_gurubk') is-invalid @enderror"
                                        placeholder="Masukan email guru bk"
                                        value="{{ old('email_gurubk', $gurubks->email_gurubk) }}" readonly>
                                    @error('email_gurubk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Foto Guru BK</label><br>
                            @if ($gurubks->foto_gurubk)
                                <img src="{{ asset('storage/' . $gurubks->foto_gurubk) }}" class="img-preview mb-3"
                                    width="150" height="150">
                            @else
                                <img src="{{ asset('images/foto-profile.png') }}" class="img-preview mb-3" width="150"
                                    height="150">
                            @endif
                            <div class="custom-file">
                                <input type="file" name="foto_gurubk" class="custom-file-input" id="customFile"
                                    onchange="previewImage()">
                                <label class="custom-file-label" for="customFile">Choose
                                    file</label>
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
@endpush
