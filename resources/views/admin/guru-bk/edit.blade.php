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
                        <a href="{{ route('data-gurubk.index') }}" class="btn bg-gradient-danger">
                            <i class="fas fa-arrow-alt-circle-left"></i>
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk_gurubk" value="Laki-Laki"
                                            {{ $gurubks->jk_gurubk == 'Laki-Laki' ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk_gurubk" value="Perempuan"
                                            {{ $gurubks->jk_gurubk == 'Perempuan' ? 'checked' : '' }}>
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
                                            <input type="text" name="telp_gurubk"
                                                class="form-control @error('telp_gurubk') is-invalid @enderror"
                                                value="{{ old('telp_gurubk', $gurubks->telp_gurubk) }}"
                                                placeholder="Cth: 8229852XXXX">
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
                                        placeholder="Masukan email guru bk"
                                        value="{{ old('email_gurubk', $gurubks->email_gurubk) }}">
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
                        <button type="submit" class="btn bg-gradient-primary">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
