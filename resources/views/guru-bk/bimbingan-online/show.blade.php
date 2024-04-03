@extends('admin.layout.master')
@section('menuGuruBkBimbinganOnline', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="{{ route('layanan-online.index') }}" class="btn btn-default">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="card card-primary card-outline direct-chat direct-chat-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $siswas->nama_siswa ?? '-' }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                                    <i class="fas fa-comments"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                @foreach ($bimbingans as $data)
                                    <!-- Check if the message is from the current user -->
                                    @if ($data->statusbimbingan == 'Guru BK')
                                        <!-- Message to the right -->
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span
                                                    class="direct-chat-name float-right">{{ $data->gurubk->nama_gurubk ?? '-' }}</span>
                                                <span
                                                    class="direct-chat-timestamp float-left">{{ $data->created_at ?? '-' }}</span>
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            @if ($data->gurubk->foto_gurubk)
                                                <img class="direct-chat-img"
                                                    src="{{ asset('storege/' . $data->gurubk->foto_gurubk) }}"
                                                    alt="Message User Image">
                                            @else
                                                <img class="direct-chat-img" src="{{ asset('images/foto-profile.png') }}"
                                                    alt="Message User Image">
                                            @endif
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                {{ $data->pesan ?? '-' }}
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->
                                    @else
                                        <!-- Message. Default to the left -->
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span
                                                    class="direct-chat-name float-left">{{ $data->siswa->nama_siswa ?? '-' }}</span>
                                                <span
                                                    class="direct-chat-timestamp float-right">{{ $data->created_at ?? '-' }}</span>
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            @if ($data->siswa->user->foto_profile)
                                                <img class="direct-chat-img"
                                                    src="{{ asset('storege/' . $data->siswa->user->foto_profile) }}"
                                                    alt="Message User Image">
                                            @else
                                                <img class="direct-chat-img" src="{{ asset('images/foto-profile.png') }}"
                                                    alt="Message User Image">
                                            @endif
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                {{ $data->pesan ?? '-' }}
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->
                                    @endif
                                @endforeach
                            </div>
                            <!--/.direct-chat-messages-->
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="{{ route('layanan-online.store') }}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="pesan" placeholder="Ketik pesan ..." class="form-control">
                                    <input type="text" name="siswa_id" value="{{ $siswas->id }}" class="form-control"
                                        hidden>
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
