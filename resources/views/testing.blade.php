<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi | BKita</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login-style/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('login-style/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login-style/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login-style/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login-style/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login-style/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-style/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body py-5 px-5">
                            <form action="/login-action" method="POST">
                                @csrf
                                <span class="login100-form-title">
                                    Form Registrasi
                                    <p>Silahkan masukan data anda dengan benar!</p>
                                </span>

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @elseif(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>NISN</label>
                                            <input type="text" name="nisn_siswa"
                                                class="form-control @error('nisn_siswa') is-invalid @enderror"
                                                value="{{ old('nisn_siswa') }}" placeholder="Masukan nisn anda">
                                            @error('nisn_siswa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama_siswa"
                                                class="form-control @error('nama_siswa') is-invalid @enderror"
                                                value="{{ old('nama_siswa') }}" placeholder="Masukan nama anda">
                                            @error('nama_siswa')
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
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tmp_lahir_siswa"
                                                class="form-control @error('tmp_lahir_siswa') is-invalid @enderror"
                                                value="{{ old('tmp_lahir_siswa') }}"
                                                placeholder="Masukan tempat lahir">
                                            @error('tmp_lahir_siswa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Tangga Lahir</label>
                                            <input type="date" name="tgl_lahir_siswa"
                                                class="form-control @error('tgl_lahir_siswa') is-invalid @enderror"
                                                value="{{ old('tgl_lahir_siswa') }}" placeholder="Masukan nama anda">
                                            @error('tgl_lahir_siswa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Jurusan</label>
                                    <select name="jurusan_id"
                                        class="form-control @error('jurusan_id') is-invalid @enderror" id="jurusanId">
                                        <option value="" selected>Pilih Jurusan</option>
                                        @foreach ($jurusans as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_jurusan ?? '-' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Kelas</label>
                                    <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror"
                                        id="kelasId">
                                        <option value="" selected>Pilih Kelas</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Agama</label>
                                    <select name="agama_siswa"
                                        class="form-control @error('agama_siswa') is-invalid @enderror">
                                        <option value="" selected>Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatoliq">Khatoliq</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Telp/ WA Siswa</label>
                                            <input type="text" name="nisn_siswa"
                                                class="form-control @error('nisn_siswa') is-invalid @enderror"
                                                value="{{ old('nisn_siswa') }}" placeholder="Masukan nisn anda">
                                            @error('nisn_siswa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Telp/ WA Orang Tua Siswa</label>
                                            <input type="text" name="nama_siswa"
                                                class="form-control @error('nama_siswa') is-invalid @enderror"
                                                value="{{ old('nama_siswa') }}" placeholder="Masukan nama anda">
                                            @error('nama_siswa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="container-login100-form-btn">
                                    <button type="submit" class="login100-form-btn">
                                        Register
                                    </button>
                                </div>

                                <div class="text-center p-t-136">
                                    <a class="txt2" href="/login">
                                        Sudah punya akun ? Login
                                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login-style/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login-style/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('login-style/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login-style/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login-style/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('login-style/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#jurusanId').change(function() {
                var jurusanId = $(this).val();
                if (jurusanId) {
                    $.ajax({
                        type: "GET",
                        url: "/getkelasbyjurusan",
                        data: {
                            jurusan_id: jurusanId
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#kelasId').empty();

                            if (data.length > 0) {
                                $.each(data, function(key, value) {
                                    $('#kelasId').append('<option value="' + value.id +
                                        '">' + value.nama_kelas + '</option>');
                                });
                            } else {
                                $('#kelasId').append(
                                    '<option value="">Kelas tidak tersedia</option>');
                            }
                        }
                    });
                } else {
                    // Jika jurusan tidak dipilih, kosongkan dropdown kelas
                    $('#kelasId').empty();
                }
            });
        });
    </script>



</body>

</html>
