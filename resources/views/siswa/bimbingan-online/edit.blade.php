@extends('admin.layout.master')

@section('menuSiswaBimbinganOnline', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('bimbingan-online.update', $bimbingans->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('bimbingan-online.index') }}" class="btn bg-gradient-secondary">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Guru BK</label>
                                    <select name="gurubk_id" class="custom-select">
                                        <option value="" selected>Pilih Guru BK</option>
                                        @foreach ($gurubks as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $bimbingans->gurubk_id ? 'selected' : '' }}>
                                                {{ $data->nama_gurubk ?? '-' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Layanan Bimbingan</label>
                                    <select name="layanan_online" class="custom-select">
                                        <option value="" selected>Pilih Layanan Bimbingan</option>
                                        <option value="Bimbingan Pribadi"
                                            {{ $bimbingans->layanan_online == 'Bimbingan Pribadi' ? 'selected' : '' }}>
                                            Bimbingan Pribadi</option>
                                        <option value="Bimbingan Sosial"
                                            {{ $bimbingans->layanan_online == 'Bimbingan Sosial' ? 'selected' : '' }}>
                                            Bimbingan Sosial</option>
                                        <option value="Bimbingan Akademik"
                                            {{ $bimbingans->layanan_online == 'Bimbingan Akademik' ? 'selected' : '' }}>
                                            Bimbingan Akademik</option>
                                        <option value="Bimbingan Karir"
                                            {{ $bimbingans->layanan_online == 'Bimbingan Karir' ? 'selected' : '' }}>
                                            Bimbingan Karir</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Keterangan Masalah</label>
                                    <textarea name="keterangan_online" class="form-control" rows="5">{{ old('keterangan_online', $bimbingans->keterangan_online) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn bg-gradient-success">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
