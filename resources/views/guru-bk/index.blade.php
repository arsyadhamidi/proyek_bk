@extends('admin.layout.master')
@section('menuDashboard', 'active')

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if (Auth()->user()->foto_profile)
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('storage/' . Auth()->user()->foto_profile) }}" alt="User profile picture">
                        @else
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/foto-profile.png') }}"
                                alt="User profile picture">
                        @endif
                    </div>

                    <h3 class="profile-username text-center">{{ Auth()->user()->name }}</h3>

                    <p class="text-muted text-center">{{ Auth()->user()->level }}</p>

                    <div class="form-group mb-3">
                        <label><strong>Nama Lengkap</strong></label>
                        <p><i>{{ Auth()->user()->name }}</i></p>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                        <label><strong>Username</strong></label>
                        <p><i>{{ Auth()->user()->username }}</i></p>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                        <label><strong>Status</strong></label>
                        <p><i>{{ Auth()->user()->level }}</i></p>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                        <label><strong>Telp</strong></label>
                        <p><i>{{ Auth()->user()->telp }}</i></p>
                    </div>
                    <hr>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="#profile" data-toggle="tab">Ganti Gambar</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session('error') }}
                        </div>
                    @elseif (session('success'))
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <form action="/setting-profile" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ Auth()->user()->name }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>No Telp</label>
                                    <input type="text" name="telp" class="form-control"
                                        value="{{ Auth()->user()->telp }}">
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                                </div>
                            </form>

                        </div>

                        <div class="tab-pane" id="settings">
                            <form action="/setting-password" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Masukan password baru anda">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="confirmpassword" class="form-control"
                                        placeholder="Masukan konfirmasi password">
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="profile">
                            <form action="/setting-gambar" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Upload Gambar</label>
                                    <input type="file" name="foto_profile" class="form-control">
                                </div>

                                <div class="form-group mb-3 d-flex flex-wrap">
                                    <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                            </form>
                            @if (Auth()->user()->foto_profile)
                                <form action="/hapus-gambar" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="oldPicture" class="form-control"
                                        value="{{ Auth()->user()->foto_profile }}}" hidden>
                                    <button type="submit" class="btn bg-gradient-danger mx-2">Hapus Gambar</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
