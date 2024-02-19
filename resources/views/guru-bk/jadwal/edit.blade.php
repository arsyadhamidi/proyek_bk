@extends('admin.layout.master')
@section('menuJadwalBimbingan', 'active')

@section('content')
    <div class="rw">
        <div class="col-lg">
            <form action="{{ route('buat-jadwal.update', $jadwals->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('buat-jadwal.index') }}" class="btn bg-gradient-danger">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Hari Bimbingan</label>
                                    <select name="hari_jadwal"
                                        class="custom-select @error('hari_jadwal') is-invalid @enderror">
                                        <option value="" selected>Pilih Hari</option>
                                        <option value="Senin" {{ $jadwals->hari_jadwal == 'Senin' ? 'selected' : '' }}>
                                            Senin</option>
                                        <option value="Selasa" {{ $jadwals->hari_jadwal == 'Selasa' ? 'selected' : '' }}>
                                            Selasa</option>
                                        <option value="Rabu" {{ $jadwals->hari_jadwal == 'Rabu' ? 'selected' : '' }}>Rabu
                                        </option>
                                        <option value="Kamis" {{ $jadwals->hari_jadwal == 'Kamis' ? 'selected' : '' }}>
                                            Kamis</option>
                                        <option value="Jumat" {{ $jadwals->hari_jadwal == 'Jumat' ? 'selected' : '' }}>
                                            Jumat</option>
                                        <option value="Sabtu" {{ $jadwals->hari_jadwal == 'Sabtu' ? 'selected' : '' }}>
                                            Sabtu</option>
                                        <option value="Minggu" {{ $jadwals->hari_jadwal == 'Minggu' ? 'selected' : '' }}>
                                            Minggu</option>
                                    </select>
                                    @error('hari_jadwal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Jam Mulai</label>
                                            <input type="time" name="jam_mulai_bimbingan"
                                                class="form-control @error('jam_mulai_bimbingan') is-invalid @enderror"
                                                value="{{ old('jam_mulai_bimbingan', $jadwals->jam_mulai_bimbingan) }}">
                                            @error('jam_mulai_bimbingan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Jam Selesai</label>
                                            <input type="time" name="jam_selesai_bimbingan"
                                                class="form-control @error('jam_selesai_bimbingan') is-invalid @enderror"
                                                value="{{ old('jam_selesai_bimbingan', $jadwals->jam_selesai_bimbingan) }}">
                                            @error('jam_selesai_bimbingan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
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
