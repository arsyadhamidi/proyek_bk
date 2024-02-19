<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | BKita</title>
    {{--  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">  --}}

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/dashboard" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if (Auth()->user()->foto_profile)
                            <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}"
                                class="user-image img-circle" alt="User Image"
                                style="object-fit: cover; width: 35px; height:35px">
                        @else
                            <img src="{{ asset('images/foto-profile.png') }}" class="user-image img-circle"
                                alt="User Image">
                        @endif
                        <span class="d-none d-md-inline">{{ Auth()->user()->name ?? '-' }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            @if (Auth()->user()->foto_profile)
                                <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}"
                                    class="img-circle elevation-2" alt="User Image"
                                    style="object-fit: cover; width: 100px; height:100px">
                            @else
                                <img src="{{ asset('images/foto-profile.png') }}" class="img-circle elevation-2"
                                    alt="User Image">
                            @endif

                            <p>
                                {{ Auth()->user()->name ?? '-' }}
                                <small>{{ Auth()->user()->level ?? '-' }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="/logout-action" class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link">
                <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image">
                <span class="brand-text font-weight-bold text-white">BimbinganKita</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link @yield('menuDashboard')">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        @if (Auth()->user()->level == 'Admin')
                            {{--  Data Jurusan  --}}
                            <li class="nav-item">
                                <a href="{{ route('data-jurusan.index') }}" class="nav-link @yield('menuDataJurusan')">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>Data Jurusan</p>
                                </a>
                            </li>

                            {{--  Data Kelas  --}}
                            <li class="nav-item">
                                <a href="{{ route('data-kelas.index') }}" class="nav-link @yield('menuDataKelas')">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>Data Kelas</p>
                                </a>
                            </li>

                            {{--  Data Wali Kelas  --}}
                            <li class="nav-item">
                                <a href="{{ route('data-walikelas.index') }}" class="nav-link @yield('menuDataWaliKelas')">
                                    <i class="nav-icon fas fa-user-tie"></i>
                                    <p>Data Wali Kelas</p>
                                </a>
                            </li>

                            {{--  Data Gugu BK  --}}
                            <li class="nav-item">
                                <a href="{{ route('data-gurubk.index') }}" class="nav-link @yield('menuDataGuruBk')">
                                    <i class="nav-icon fas fa-user-tie"></i>
                                    <p>Data Guru BK</p>
                                </a>
                            </li>

                            {{--  Data Siswa  --}}
                            <li class="nav-item">
                                <a href="{{ route('data-siswa.index') }}" class="nav-link @yield('menuDataSiswa')">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>Data Siswa</p>
                                </a>
                            </li>

                            {{--  User Registrasi  --}}
                            <li class="nav-item">
                                <a href="{{ route('user-registrasi.index') }}" class="nav-link @yield('menuDataUserRegistrasi')">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>User Registrasi</p>
                                </a>
                            </li>
                        @elseif(Auth()->user()->level == 'Guru BK')
                            {{--  Jadwal Bimbingan  --}}
                            <li class="nav-item">
                                <a href="{{ route('buat-jadwal.index') }}" class="nav-link @yield('menuJadwalBimbingan')">
                                    <i class="nav-icon fas fa-calendar-alt"></i>
                                    <p>Jadwal Bimbingan</p>
                                </a>
                            </li>
                            {{--  Data Bimbingan Siswa  --}}
                            <li class="nav-item">
                                <a href="{{ route('bimbingan-siswa.index') }}" class="nav-link @yield('menuBimbinganSiswa')">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Bimbingan Siswa</p>
                                </a>
                            </li>
                            {{--  Data Laporan  --}}
                            <li class="nav-item">
                                <a href="{{ route('gurubk-laporan.index') }}" class="nav-link @yield('menuGuruBkLaporan')">
                                    <i class="nav-icon fas fa-folder"></i>
                                    <p>Laporan WaliKelas</p>
                                </a>
                            </li>
                        @elseif(Auth()->user()->level == 'Siswa')
                            {{--  Melakukan Bimbingan  --}}
                            <li class="nav-item">
                                <a href="{{ route('mengajukan-bimbingan.index') }}"
                                    class="nav-link @yield('menuMelakukanBimbingan')">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Lakukan Bimbingan</p>
                                </a>
                            </li>
                        @elseif (Auth()->user()->level == 'Wali Kelas')
                            {{--  Laporan Wali Kelas  --}}
                            <li class="nav-item">
                                <a href="{{ route('laporan-walikelas.index') }}"
                                    class="nav-link @yield('menuLaporanWaliKelas')">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Laporan WaliKelas</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Bimbingan</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} SafeNetwork
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.2.0-rc
                </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('js/preview.js') }}"></script>
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    @stack('custom-script')
</body>

</html>
