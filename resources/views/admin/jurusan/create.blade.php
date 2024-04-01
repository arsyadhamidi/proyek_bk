@extends('admin.layout.master')

@section('menuDataJurusan', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('data-jurusan.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('data-jurusan.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>
                                        Kode Jurusan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="kode_jurusan"
                                        class="form-control @error('kode_jurusan') is-invalid @enderror"
                                        value="{{ old('kode_jurusan') }}" placeholder="Masukan kode jurusan">
                                    @error('kode_jurusan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>
                                        Nama Jurusan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="nama_jurusan"
                                        class="form-control @error('nama_jurusan') is-invalid @enderror"
                                        value="{{ old('nama_jurusan') }}" placeholder="Masukan nama jurusan">
                                    @error('nama_jurusan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
