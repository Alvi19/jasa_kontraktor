@extends('layouts.app')
@section('title', 'Detail Kontraktor')
@section('content')
    <div class="container-fluid">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body border">
                    <h1 style="text-align: start" class="text-dark-light mb-5"><strong>Detail Kontraktor</strong></h1>
                    <div class="table-responsive border-bottom-dark">
                        <div class="row align-items-start text-center mx-2" style="">
                            <div class="container px-4">
                                <div class="row gx-5">
                                    <div class="col-3">
                                        <img src="{{ '/upload/' . $kontraktors->foto_kontraktor }}"
                                            style="height: 150px ; width:200px" class="float-left" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body text-lg-start">
                                            <h5 class="card-title text-bold">{{ $kontraktors->nama }}</h5>
                                            <p class="card-text">{{ $kontraktors->deskripsi }}
                                            </p>
                                            <div class="col">
                                                <a class="btn btn-md btn-primary ti ti-message-2" href=""> Chat</a>
                                                <a class="btn btn-md btn-primary"
                                                    href="{{ route('form.show', ['form' => $kontraktors->id]) }}">Sewa</a>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-5">
                                <div class="card-header bg-primary text-white text-lg-start">
                                    Informasi Jasa
                                </div>
                                <div class="card-body text-lg-start">
                                    <blockquote class="blockquote mb-0">
                                        <img src="{{ '/upload/' . $kontraktors->foto_pembangunan }}"
                                            style="height: 150px ; width:200px" class="float-left" alt="foto_pembangunan">
                                        <p>{{ $kontraktors->riwayat_pembangunan }}</p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="container-fluid">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <img src="/upload/1693593006_K3.jpg" class="card-img-top"
                                                            alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Jasa</h5>
                                                            <p class="card-text">Some quick example text to build on the
                                                                card title and make up the bulk of
                                                                the
                                                                card's content.</p>
                                                            <a href="#" class="btn btn-primary">Sewa</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <img src="/upload/1693593006_K3.jpg" class="card-img-top"
                                                            alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Jasa</h5>
                                                            <p class="card-text">Some quick example text to build on the
                                                                card title and make up the bulk of
                                                                the
                                                                card's content.</p>
                                                            <a href="#" class="btn btn-primary">Sewa</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <img src="/upload/1693593006_K3.jpg" class="card-img-top"
                                                            alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Jasa</h5>
                                                            <p class="card-text">Some quick example text to build on the
                                                                card title and make up the bulk of
                                                                the
                                                                card's content.</p>
                                                            <a href="#" class="btn btn-primary">Sewa</a>
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
                </div>
            </div>
        </div>
    </div>
@endsection
