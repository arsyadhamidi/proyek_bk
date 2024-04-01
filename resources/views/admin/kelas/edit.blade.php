@extends('admin.layout.master')

@section('menuDataKelas', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('data-kelas.update', $kelass->id) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('data-kelas.show', $kelass->jurusan_id) }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <input type="text" name="jurusan_id" class="form-control" value="{{ $kelass->jurusan_id }}"
                            hidden>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>
                                        Nama Kelas
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="nama_kelas"
                                        class="form-control @error('nama_kelas') is-invalid @enderror"
                                        value="{{ old('nama_kelas', $kelass->nama_kelas ?? '-') }}"
                                        placeholder="Masukan nama kelas">
                                    @error('nama_kelas')
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
