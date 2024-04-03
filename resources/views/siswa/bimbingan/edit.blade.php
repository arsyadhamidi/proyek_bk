@extends('admin.layout.master')

@section('menuMelakukanBimbingan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <form action="{{ route('mengajukan-bimbingan.update', $bimbingans->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <a href="{{ route('mengajukan-bimbingan.index') }}" class="btn btn-default">
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
                                    <label>Tanggal Bimbingan</label>
                                    <input type="date" name="tgl_bimbingan"
                                        class="form-control @error('tgl_bimbingan') is-invalid @enderror" id="tglBimbingan"
                                        value="{{ $bimbingans->tgl_bimbingan ?? '-' }}">
                                    @error('tgl_bimbingan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Guru BK</label>
                                    <select name="gurubk_id" class="form-control @error('gurubk_id') is-invalid @enderror"
                                        style="width: 100%;" id="idGuruBk">
                                        <option value="" selected>Pilih Guru BK</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Jadwal Bimbingan</label>
                                    <select name="jadwal_id" class="form-control @error('jadwal_id') is-invalid @enderror"
                                        style="width: 100%;" id="idJadwal">
                                        <option value="" selected>Pilih Jadwal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Layanan Bimbingan</label>
                                    <select name="status_bimbingan"
                                        class="form-control @error('status_bimbingan') is-invalid @enderror"
                                        style="width: 100%;" id="statusBimbingan">
                                        <option value="" selected>Pilih Layanan Bimbingan</option>
                                        <option value="Bimbingan Pribadi"
                                            {{ $bimbingans->status_bimbingan == 'Bimbingan Pribadi' ? 'selected' : '' }}>
                                            Bimbingan Pribadi</option>
                                        <option value="Bimbingan Sosial"
                                            {{ $bimbingans->status_bimbingan == 'Bimbingan Sosial' ? 'selected' : '' }}>
                                            Bimbingan Sosial</option>
                                        <option value="Bimbingan Akademik"
                                            {{ $bimbingans->status_bimbingan == 'Bimbingan Akademik' ? 'selected' : '' }}>
                                            Bimbingan Akademik</option>
                                        <option value="Bimbingan Karir"
                                            {{ $bimbingans->status_bimbingan == 'Bimbingan Karir' ? 'selected' : '' }}>
                                            Bimbingan Karir</option>
                                    </select>
                                    @error('status_bimbingan')
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
                                        rows="5" placeholder="Masukan keluhan yang dialami" id="editor">{{ old('keterangan_bimbingan', $bimbingans->keterangan_bimbingan ?? '-') }}</textarea>
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
        $(document).ready(function() {
            $('#idGuruBk').select2({
                theme: 'bootstrap4',
            });

            $('#idJadwal').select2({
                theme: 'bootstrap4',
            });

            $('#statusBimbingan').select2({
                theme: 'bootstrap4',
            });

        });
    </script>
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

    <script>
        $(document).ready(function() {
            $('#tglBimbingan').change(function() {
                var selectedDate = $(this).val();
                $.ajax({
                    url: '/bimbingan-getgurubkbydate',
                    type: 'GET',
                    data: {
                        selectedDate: selectedDate
                    },
                    success: function(response) {
                        $('#idGuruBk').empty().append(response.options);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#idGuruBk').change(function() {
                var selectedBimbinganId = $(this).val();
                var selectedDate = $('#tglBimbingan').val();

                if (selectedBimbinganId !== '' && selectedDate !== '') {
                    $.ajax({
                        url: '/get-jadwal-bimbingan/' + selectedBimbinganId + '?tgl_bimbingan=' +
                            selectedDate,
                        type: 'GET',
                        success: function(data) {
                            $('#idJadwal').html(data
                                .options); // Mengubah .empty().append() menjadi .html()
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                } else {
                    $('#idJadwal').empty(); // Menghapus isi dari elemen dengan ID 'idJadwal'
                }
            });
        });
    </script>
@endpush
