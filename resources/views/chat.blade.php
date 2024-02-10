@extends('layouts.app')
@section('title', 'Chat')
@section('content')

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body border">
                    <div class="container-fluid mt-2">
                        <h1 class="mt-1 text-bold"><strong>Chat</strong></h1>
                        <hr class="my-2">
                        {{-- <div class="bg-danger"> --}}
                        <nav class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="font-italic"><a href="{{ route('data_client.index') }}">Riwayat Jasa</a>
                                </li>
                                <li class="ti ti-chevron-right mt-1 font-italic"><a href="">Chat</a></li>
                            </ol>
                        </nav>
                        {{-- </div> --}}
                        {{-- <hr class="my-2"> --}}
                        <a href="{{ route('data_client.index') }}" class="btn btn-md btn-primary mx-2 mt-2 "><i class="ti ti-arrow-back-up mt-5">
                                kembali</i></a>

                        {{-- <hr class="my-2"> --}}
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body border p-4 bg-primary-subtle">
                                        <ul class="list-unstyled">
                                            @foreach ($data as $item)
                                            @if ($item->sender_id != $id)
                                            <li class="d-flex justify-content-between mb-4">
                                                <div class="card w-100">
                                                    <div class="card-header d-flex justify-content-between p-3">
                                                        <p class="text-bold mb-0">
                                                            {{ $item->sender->nama_lengkap }}
                                                        </p>
                                                        <p class="text-muted small mb-0"><i class="far fa-clock"></i>
                                                            {{ $item->created_at }}
                                                        </p>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="mb-0">
                                                            {{ $item->content }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar" class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                                            </li>
                                            @else
                                            <li class="d-flex justify-content-between mb-4">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                                                <div class="card w-100">
                                                    <div class="card-header d-flex justify-content-between p-3">
                                                        <p class="fw-bold mb-0">
                                                            {{ $item->sender->nama_lengkap }}
                                                        </p>
                                                        <p class="text-muted small mb-0"><i class="far fa-clock"></i>
                                                            {{ $item->created_at }}
                                                        </p>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="mb-0">
                                                            {{ $item->content }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                            @endforeach

                                            <form method="POST" action="{{ route('chat.send', $id) }}">
                                                @csrf
                                                <li class="bg-white mb-3">
                                                    <div class="form-outline">
                                                        <textarea class="form-control" name="content" id="content" rows="4"></textarea>
                                                        <label class="form-label" for="textAreaExample2">Message</label>
                                                    </div>
                                                </li>
                                                <button type="submit" class="btn btn-info btn-rounded float-end">Send</button>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection