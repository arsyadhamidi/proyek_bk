@extends('admin.layout.master')

@section('menuMelakukanBimbingan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('mengajukan-bimbingan.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('mengajukan-bimbingan.index') }}" class="btn bg-gradient-secondary">
                            <i class="fas fa-arrow-alt-circle-left"></i>
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
                                    <select name="gurubk_id" class="custom-select @error('gurubk_id') is-invalid @enderror"
                                        id="idGuruBk">
                                        <option value="" selected>Pilih Guru BK</option>
                                        @foreach ($gurubks as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_gurubk ?? '-' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Jadwal Bimbingan</label>
                                    <select name="jadwal_id" class="custom-select @error('jadwal_id') is-invalid @enderror"
                                        id="idJadwal">
                                        <option value="" selected>Pilih Jadwal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Layanan Bimbingan</label>
                                    <select name="status_bimbingan"
                                        class="custom-select @error('status_bimbingan') is-invalid @enderror">
                                        <option value="" selected>Pilih Layanan Bimbingan</option>
                                        <option value="Bimbingan Pribadi">Bimbingan Pribadi</option>
                                        <option value="Bimbingan Sosial">Bimbingan Sosial</option>
                                        <option value="Bimbingan Akademik">Bimbingan Akademik</option>
                                        <option value="Bimbingan Karir">Bimbingan Karir</option>
                                    </select>
                                    @error('status_bimbingan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Tanggal Bimbingan</label>
                                    <input type="date" name="tgl_bimbingan"
                                        class="form-control @error('tgl_bimbingan') is-invalid @enderror">
                                    @error('tgl_bimbingan')
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
                                    <label>Keterangan Bimbingan</label>
                                    <textarea name="keterangan_bimbingan" class="form-control @error('keterangan_bimbingan') is-invalid @enderror"
                                        rows="5" placeholder="Masukan keluhan yang dialami">{{ old('keterangan_bimbingan') }}</textarea>
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
@push('custom-script')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#idGuruBk').on('change', function() {
                let id_gurubk = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: "/jquery-gurubk",
                    data: {
                        id_gurubk: id_gurubk
                    },
                    cache: false,
                    success: function(data) {
                        $('#idJadwal').html(data);
                    },
                    error: function(data) {
                        console.log('error: ', data);
                    }
                });
            });
        });
    </script>
@endpush
