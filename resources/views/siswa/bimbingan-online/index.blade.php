@extends('admin.layout.master')

@section('menuSiswaBimbinganOnline', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('bimbingan-online.create') }}" class="btn bg-gradient-primary">
                        <i class="fas fa-plus"></i>
                        Lakukan Bimbingan
                    </a>
                </div>
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
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Guru BK</th>
                                <th>Layanan</th>
                                <th>Bimbingan</th>
                                <th>Balasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bimbingans as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->gurubk->nama_gurubk ?? '-' }}</td>
                                    <td>{{ $data->layanan_online ?? '-' }}</td>
                                    <td>{{ $data->keterangan_online ?? '-' }}</td>
                                    <td>{{ $data->balasan_online ?? '-' }}</td>
                                    <td>
                                        @if ($data->balasan_online != null)
                                            <button type="button" class="btn bg-gradient-success" type="submit" disabled>
                                                Selesai
                                            </button>
                                        @else
                                            <a href="{{ route('bimbingan-online.edit', $data->id) }}"
                                                class="btn bg-gradient-primary">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('bimbingan-online.destroy', $data->id) }}" method="POST"
                                                onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn bg-gradient-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                    Hapus
                                                </button>
                                            </form>
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
