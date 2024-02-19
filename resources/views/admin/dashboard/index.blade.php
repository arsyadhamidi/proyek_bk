@extends('admin.layout.master')
@section('menuDashboard', 'active')

@section('content')
    @if (Auth()->user()->level == 'Admin')
        @include('admin.index')
    @elseif(Auth()->user()->level == 'Guru BK')
        @include('guru-bk.index')
    @elseif(Auth()->user()->level == 'Siswa')
        @include('siswa.index')
    @elseif (Auth()->user()->level == 'Wali Kelas')
        @include('wali-kelas.index')
    @endif
@endsection
