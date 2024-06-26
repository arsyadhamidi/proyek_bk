@extends('admin.layout.master')

@section('menuSiswaBimbinganOnline', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    Bimbingan Online
                </div>
                <div class="card-body">
                    @php
                        $siswas = \App\Models\Siswa::where('users_id', Auth()->user()->id)->first();
                    @endphp

                    @if (empty($siswas))
                        <div class="alert alert-default-warning">
                            <h4 class="alert-heading">Perhatian!</h4>
                            Harap isi biodata siswa sebelum bimbingan online. Terima kasih.
                        </div>
                    @endif

                    <table class="table table-bordered table-striped" id="myTable">
                        <thead class="bg-gradient-primary">
                            <tr>
                                <th>No.</th>
                                <th>Guru BK</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gurubks as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_gurubk ?? '-' }}</td>
                                    <td>{{ $data->jk_gurubk ?? '-' }}</td>
                                    <td>{{ $data->email_gurubk ?? '-' }}</td>
                                    <td>{{ $data->telp_gurubk ?? '-' }}</td>
                                    <td width="15%">
                                        @if (empty($siswas))
                                            -
                                        @else
                                            <a href="{{ route('bimbingan-online.show', $data->id) }}"
                                                class="btn btn-sm bg-gradient-success">
                                                <i class="fas fa-comments"></i>
                                                Chatt
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
