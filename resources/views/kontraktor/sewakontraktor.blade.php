@extends('layouts.app')
@section('title', 'Sewa Kontraktor')
@section('content')
    <div class="container-fluid">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body border p-5">
                    {{-- <h1 style="text-align: center" class="text-dark-light mb-5"><strong></strong></h1> --}}
                    <div class="table-responsive border-bottom-dark mb-5">
                        <div class="row align-items-start text-center mx-2" style="">
                            @foreach ($kontraktors as $item)
                                <div class="card border-bottom bg-primary mx-2" style="width: 15rem;">
                                    <img height="150px" width="" class="mt-2"
                                        src="{{ '/upload/' . $item->foto_kontraktor }}" alt="">
                                    <div class="card-body">
                                        <p class="card-text text-light">{{ $item->deskripsi }}</p>
                                        <a href="/sewakontraktor/detailkontraktor/{{ $item->id }}"
                                            class="btn btn-dark-light" style="width: 10rem">Detail</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
