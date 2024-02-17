@extends('layouts.app')
@section('title', 'Profile')

@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body">
                    <h1 style="text-align:start" class="text-primary mb-4"><strong>Profile {{ $user->nama_lengkap }}</strong></h1>
                    <hr class="py-2 mb-1 my-2">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- Show Profile -->
                    <h5 class="card-title text-bold">{{ $user->nama_lengkap }}</h5>
                    <p class="card-text">{{ $user->email }}</p>

                    <p class="card-text">Pemilik: {{ $data->pemilik }}</p>
                    <p class="card-text">Jumlah Tukang: {{ $data->jumlah_tukang }} Orang</p>
                    <p class="card-text">Alamat: {{ $data->alamat }}</p>

                    <p class="card-text">{{ $data->keterangan }}</p>
                </div>
            </div>
            @endsection