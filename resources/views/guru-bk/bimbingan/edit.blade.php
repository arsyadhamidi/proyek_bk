@extends('admin.layout.master')

@section('menuMelakukanBimbingan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('bimbingan-siswa.update', $bimbingans->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('bimbingan-siswa.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                {{ session('error') }}
                            </div>
                        @elseif (session('success'))
                            <div class="alert alert-success  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Guru BK</label>
                                    <input type="text" class="form-control"
                                        value="{{ $bimbingans->gurubk->nama_gurubk ?? '-' }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Jadwal Bimbingan</label>
                                    <input type="text" class="form-control"
                                        value="{{ $bimbingans->jadwal->hari_jadwal ?? '-' }} / {{ $bimbingans->jadwal->jam_mulai_bimbingan ?? '-' }} - {{ $bimbingans->jadwal->jam_selesai_bimbingan ?? '-' }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Status Layanan</label>
                                    <input type="text" class="form-control"
                                        value="{{ $bimbingans->status_bimbingan ?? '-' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Keterangan Bimbingan</label>
                                    <textarea name="keterangan_bimbingan" class="form-control @error('keterangan_bimbingan') is-invalid @enderror"
                                        rows="5" placeholder="Masukan keluhan yang dialami" readonly>{!! strip_tags($bimbingans->keterangan_bimbingan ?? '-') !!}</textarea>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Balasan</label>
                                    <textarea name="balasan_bimbingan" class="form-control @error('balasan_bimbingan') is-invalid @enderror" rows="5"
                                        placeholder="Masukan balasan bimbingan" id="editor">{{ old('balasan_bimbingan') }}</textarea>
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
