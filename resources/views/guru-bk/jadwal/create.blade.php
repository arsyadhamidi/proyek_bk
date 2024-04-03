@extends('admin.layout.master')
@section('menuJadwalBimbingan', 'active')

@section('content')
    <div class="rw">
        <div class="col-lg">
            <form action="{{ route('buat-jadwal.store') }}" method="POST">
                @csrf
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <a href="{{ route('buat-jadwal.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i>
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
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
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
                                            <div class="input-group date" id="timepickerMulai" data-target-input="nearest">
                                                <input type="text" name="jam_mulai_bimbingan"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#timepickerMulai" />
                                                <div class="input-group-append" data-target="#timepickerMulai"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                            </div>
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
                                            <div class="input-group date" id="timepickerSelesai"
                                                data-target-input="nearest">
                                                <input type="text" name="jam_selesai_bimbingan"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#timepickerSelesai" />
                                                <div class="input-group-append" data-target="#timepickerSelesai"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
@push('custom-script')
    <script>
        $('#timepickerMulai').datetimepicker({
            format: 'LT'
        });

        $('#timepickerSelesai').datetimepicker({
            format: 'LT'
        });
    </script>
@endpush
