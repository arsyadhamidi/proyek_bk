@extends('admin.layout.master')

@section('menuDataUserRegistrasi', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Data User Registrasi
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Lengkap</th>
                            <th>Email Address</th>
                            <th>Password</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($data->foto_profile)
                                            <img src="{{ asset('storage/' . $data->foto_profile) }}" class="img-fluid rounded"
                                                width="100" alt="profile">
                                        @else
                                            <img src="{{ asset('images/foto-profile.png') }}" class="img-fluid rounded"
                                                width="100" alt="profile">
                                        @endif
                                    </td>
                                    <td>{{ $data->name ?? '-' }}</td>
                                    <td>{{ $data->email ?? '-' }}</td>
                                    <td>{{ $data->duplicate ?? '-' }}</td>
                                    <td>{{ $data->level ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
