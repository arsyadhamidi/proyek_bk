@extends('admin.layout.master')
@section('menuDataGuruBk', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('data-gurubk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('data-gurubk.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>NIP Guru BK</label>
                                    <input type="text" name="nip_gurubk"
                                        class="form-control @error('nip_gurubk') is-invalid @enderror"
                                        placeholder="Masukan nip guru bk" value="{{ old('nip_gurubk') }}">
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
                                        placeholder="Masukan nama guru bk" value="{{ old('nama_gurubk') }}">
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk_gurubk" value="Laki-Laki"
                                            checked>
                                        <label class="form-check-label">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk_gurubk" value="Perempuan">
                                        <label class="form-check-label">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                <label>Telp Guru BK</label>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <input type="text" name="first_telp" class="form-control" value="+62"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <input type="text" name="telp_gurubk"
                                                class="form-control @error('telp_gurubk') is-invalid @enderror"
                                                value="{{ old('telp_gurubk') }}" placeholder="Cth: 8229852XXXX">
                                            @error('telp_gurubk')
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
                                    <label>Email Guru Bk</label>
                                    <input type="email" name="email_gurubk"
                                        class="form-control @error('email_gurubk') is-invalid @enderror"
                                        placeholder="Masukan email guru bk" value="{{ old('email_gurubk') }}">
                                    @error('email_gurubk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Foto Guru BK</label>
                                    <input type="file" name="foto_gurubk" class="form-control">
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
