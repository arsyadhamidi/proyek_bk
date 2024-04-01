@extends('admin.layout.master')

@section('menuGuruBkBimbinganOnline', 'active')

@section('content')

    <div class="row">
        <div class="col-lg">
            <form action="{{ route('layanan-online.update', $bimbingans->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('layanan-online.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow--left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Guru BK</label>
                                    <input type="text" name="gurubk_id" class="form-control"
                                        value="{{ $bimbingans->gurubk->nama_gurubk ?? '-' }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Layanan Bimbingan</label>
                                    <input type="text" name="layanan_online" class="form-control"
                                        value="{{ $bimbingans->layanan_online ?? '-' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg">
                                <label>Keterangan Bimbingan</label>
                                <textarea name="keterangan_online" class="form-control" rows="5" readonly>{{ $bimbingans->keterangan_online ?? '-' }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label>Balasan Bimbingan</label>
                                <textarea name="balasan_online" class="form-control" rows="5">{{ old('balasan_online') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn bg-gradient-success">
                            Berikan Balasan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
