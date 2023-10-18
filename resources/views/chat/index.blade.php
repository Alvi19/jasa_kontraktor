@extends('layouts.app')
@section('title', 'Group Chat')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-3">
            <div class="row">
                <div class="mb-4 mb-md-0">
                    <h2 class="font-weight-bold mb-3 text-center text-lg-start"><strong>Daftar Chat Client</strong></h2>
                    <hr class="my-2 py-2">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($data as $item)
                                {{-- @if ($item->sender_id != $id) --}}
                                <ul class="list-unstyled mb-0">
                                    <li class="p-2 border-bottom" style="background-color: #eee;">
                                        <a href="{{ route('chat.show', ['chat' => $item->id]) }}"
                                            class="d-flex justify-content-between">
                                            <div class="d-flex flex-row">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp"
                                                    alt="avatar"
                                                    class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                    width="60">
                                                <div class="pt-1">
                                                    <p class="fw-bold mb-0">{{ $item->nama_lengkap }}</p>
                                                    {{-- <p class="small text-muted"> {{ $item->content }} --}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="pt-1">
                                                {{-- {{ $item->created_at }} --}}
                                                <p class="small text-muted mb-1"></p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                {{-- @endif --}}
                            @endforeach
                        </div>
                    </div>

                </div>



            </div>

        </div>
    </section>
@endsection
