<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js " lang="en"> <!--<![endif]-->

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Meta -->
    <title>Landing | BKita</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('landing/images/apple-touch-icon.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet">

    <!-- Custom & Default Styles -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/style.css') }}">

    <!--[if lt IE 9]>
  <script src="js/vendor/html5shiv.min.js"></script>
  <script src="js/vendor/respond.min.js"></script>
 <![endif]-->

</head>

<body>

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="{{ asset('landing/images/loader.gif') }}" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        <!-- BEGIN # MODAL LOGIN -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Begin # DIV Form -->
                    <div id="div-forms">
                        <form id="login-form">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="flaticon-add" aria-hidden="true"></span>
                            </button>
                            <div class="modal-body">
                                <input class="form-control" type="text" placeholder="What you are looking for?"
                                    required>
                            </div>
                        </form><!-- End # Login Form -->
                    </div><!-- End # DIV Form -->
                </div>
            </div>
        </div>
        <!-- END # MODAL LOGIN -->

        <header class="header">
            <div class="topbar clearfix">
                <div class="container">
                    <div class="row-fluid">
                        <div class="col-md-6 col-sm-6 text-left">
                            <p>
                                <strong><i class="fa fa-phone"></i></strong> +62 852-1552-2091 &nbsp;&nbsp;
                                <strong><i class="fa fa-instagram"></i></strong> <a
                                    href="mailto:#">smknegeri1batusangkar</a>
                            </p>
                        </div><!-- end left -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end topbar -->

            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo-normal">
                            <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}"
                                    alt="" width="50"></a>
                        </div>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/">Beranda</a></li>
                            <li><a href="#aboutContent">Tentang Kami</a></li>
                            <li><a href="#guruKami">Guru BK</a></li>
                            <li><a href="#lokasi">Maps</a></li>
                            <li class="iconitem"><a class="btn btn-primary" href="/login">Login / Masuk</a></li>
                        </ul>
                    </div>
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>

        <section id="home" class="video-section js-height-full">
            <div class="overlay"></div>
            <div class="home-text-wrapper relative container">
                <div class="home-message">
                    <p>Layanan Bimbingan Konseling</p>
                    <small>
                        Bersama kita bisa mengatasi setiap rintangan. Dengan bimbingan dan dukungan, kita akan melewati
                        setiap tantangan dan menuju kehidupan yang lebih baik. Setiap langkah kecil adalah langkah
                        menuju keberhasilan dan kesejahteraan. Mari kita mulai perjalanan menuju pertumbuhan pribadi dan
                        kebahagiaan bersama!
                    </small>
                    <div class="btn-wrapper">
                        <div class="text-center">
                            <a href="#" class="btn btn-primary wow slideInLeft">Bimbingan Selengkapnya</a>
                            &nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-default wow slideInRight">Layanan
                                Kami</a>
                        </div>
                    </div><!-- end row -->
                </div>
            </div>
            <div class="slider-bottom">
                <span>Explore <i class="fa fa-angle-down"></i></span>
            </div>
        </section>

        <section class="section" id="aboutContent">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 hidden-sm hidden-xs">
                        <div class="custom-module">
                            <img src="{{ asset('images/about.jpg') }}" alt=""
                                class="img-responsive wow slideInLeft">
                        </div><!-- end module -->
                    </div><!-- end col -->
                    <div class="col-md-8">
                        <div class="custom-module p40l">
                            <h2>
                                Temukan Dukungan dan Bimbingan yang Anda Butuhkan di Layanan Konseling Kami.
                            </h2>

                            <p>
                                Kami adalah Bkita, sistem informasi yang peduli dan mendukung siswa dalam menghadapi
                                berbagai tantangan pribadi. Dengan Bkita, Anda akan menemukan bantuan dan solusi untuk
                                mengatasi masalah Anda, dengan jaminan privasi yang kami jaga dengan ketat. Bersama,
                                kita bisa mengatasi setiap rintangan dan membangun masa depan yang lebih baik
                            </p>

                            <hr class="invis">

                            <div class="row">
                                <div class="col-lg">
                                    <ul class="check">
                                        <li>Pemahaman Diri yang Lebih Baik</li>
                                        <li>Penyelesaian Masalah</li>
                                        <li>Peningkatan Keterampilan Komunikasi</li>
                                        <li>Manajemen Stres</li>
                                        <li>Peningkatan Hubungan Interpersonal</li>
                                        <li>Pencapaian Tujuan</li>
                                        <li>Peningkatan Kualitas Hidup</li>
                                    </ul><!-- end check -->
                                </div><!-- end col-lg-4 -->
                            </div><!-- end row -->

                            <hr class="invis">

                            <div class="btn-wrapper">
                                <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                            </div>

                        </div><!-- end module -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <section class="section gb" id="guruKami">
            <div class="container">
                <div class="section-title text-center">
                    <h3>Guru Bimbingan Konseling</h3>
                    <p>
                        Membantu Anda Menemukan Jalan Kembali Menuju Pertumbuhan dan Kesejahteraan. Kami hadir dengan
                        tim profesional: Guru Bimbingan Konseling yang Berdedikasi untuk Membantu Anda Mencapai Potensi
                        Penuh.
                    </p>
                </div><!-- end title -->

                <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
                    <div class="caro-item">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('images/darmayanti.jpg') }}" alt=""
                                    class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{ asset('images/darmayanti.jpg') }}" title="" target="_blank"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4>
                                    <small>Guru Bimbingan Konseling</small>
                                    <a href="#" title="">Darmayenti, S.Pd</a>
                                </h4>
                            </div><!-- end details -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="caro-item">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('images/della.jpg') }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{ asset('images/della.jpg') }}" title="" target="_blank"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4>
                                    <small>Guru Bimbingan Konseling</small>
                                    <a href="#" title="">Della Rahmadani, S.Pd</a>
                                </h4>
                            </div><!-- end details -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="caro-item">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('images/desi.jpg') }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{ asset('images/desi.jpg') }}" title="" target="_blank"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4>
                                    <small>Guru Bimbingan Konseling</small>
                                    <a href="#" title="">Desi Ratnasari, S.Pd</a>
                                </h4>
                            </div><!-- end details -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="caro-item">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('images/foto-profile.png') }}" alt=""
                                    class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{ asset('images/foto-profile.png') }}" title=""
                                        target="_blank"><i class="fa fa-search"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4>
                                    <small>Guru Bimbingan Konseling</small>
                                    <a href="#" title="">Yendri Putra, S.Pd.i</a>
                                </h4>
                            </div><!-- end details -->
                        </div><!-- end box -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="invis">

                <div class="section-button text-center">
                    <a href="#" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
            </div><!-- end container -->
        </section>

        <section class="section" id="lokasi">
            <div class="container">
                <div class="row">
                    <div class="col-lg">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6781844594507!2d100.62748277372289!3d-0.4802164352737446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2ad328107c712b%3A0x567834d1233e9a2d!2sSMK%20Negeri%201%20Batusangkar!5e0!3m2!1sid!2sid!4v1709473894795!5m2!1sid!2sid"
                            width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="section bgcolor1">
            <div class="container">
                <a href="#">
                    <div class="row callout">
                        <div class="col-md-4 text-center">
                            <h3>Layanan BKita</h3>
                            <h4>Memulai harimu dengan senyuman!</h4>
                        </div><!-- end col -->

                        <div class="col-md-8">
                            <p class="lead">Temukan Solusi untuk Tantangan Pribadimu Melalui Aplikasi Kami, Semua
                                Masalah Menemukan Jalan Penyelesaian.</p>
                        </div>
                    </div><!-- end row -->
                </a>
            </div><!-- end container -->
        </section>

        <div class="copyrights">
            <div class="container">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="cop-logo">
                            <a href="#"><img src="{{ asset('images/logo.png') }}" alt=""
                                    class="img-fluid" width="50"></a>
                        </div>
                    </div>

                    <div class="pull-right">
                        <div class="footer-links">
                            <ul class="list-inline">
                                <li>SMKN 1 Batusangkar {{ date('Y') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end container -->
        </div><!-- end copy -->
    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    <script src="{{ asset('landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/carousel.js') }}"></script>
    <script src="{{ asset('landing/js/animate.js') }}"></script>
    <script src="{{ asset('landing/js/custom.js') }}"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="{{ asset('landing/js/videobg.js') }}"></script>

</body>

</html>
