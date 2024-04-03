@extends('admin.layout.master')
@section('menuLaporanWaliKelas', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('laporan-walikelas.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('laporan-walikelas.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Guru BK</label>
                                    <select name="gurubk_id" class="form-select @error('gurubk_id') is-invalid @enderror"
                                        id="selectGuruBk" style="width: 100%">
                                        <option value="" selected>Pilih Guru BK</option>
                                        @foreach ($gurubks as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_gurubk ?? '-' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Siswa</label>
                                    <select name="siswa_id" class="form-select @error('siswa_id') is-invalid @enderror"
                                        id="selectSiswaId" style="width: 100%">
                                        <option value="" selected>Pilih Siswa</option>
                                        @foreach ($siswas as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_siswa ?? '-' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label>Keterangan Laporan</label>
                                <textarea name="laporan_siswa" rows="5" class="form-control @error('laporan_siswa') is-invalid @enderror"
                                    placeholder="Masukan keterangan laporan" id="editor">{{ old('laporan_siswa') }}</textarea>
                                @error('laporan_siswa')
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
        $('#selectGuruBk').select2({
            theme: 'bootstrap4',
        });
        $('#selectSiswaId').select2({
            theme: 'bootstrap4',
        });
    </script>
@endpush
