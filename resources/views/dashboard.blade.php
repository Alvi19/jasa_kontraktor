@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <section class="section">
        <div class="section-header">
            <h1 class=""><strong>Dashboard</strong></h1>
            <hr class="my-2 py-1">
        </div>
        <h3 class="">Selamat Datang </h3>
        <h1 class="font-weight-bold font-weight-300 py-1"><strong>Admin Kontruksi</strong></h1>
        <div class="section-body py-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 border border-primary">
                        {{-- <div class="card-icon bg-primary">
                            <i class="ti ti-square-rounded"></i>
                        </div> --}}
                        <div class="card-wrap">
                            <div class="card-header bg-primary">
                                <h4 class="text-white"><strong>Total Jasa</strong></h4>
                            </div>
                            <div class="card-body">
                                {{-- {{ $gejalas }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 border border-success">
                        {{-- <div class="card-icon bg-danger">
                            <i class="fas fa-medkit"></i>
                        </div> --}}
                        <div class="card-wrap">
                            <div class="card-header bg-success">
                                <h4 class="text-white"><strong>Data Client</strong></h4>
                            </div>
                            <div class="card-body">
                                {{-- {{ $penyakits }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 border border-indigo">
                        {{-- <div class="card-icon bg-warning">
                            <i class="fas fa-users"></i>
                        </div> --}}
                        <div class="card-wrap">
                            <div class="card-header bg-indigo">
                                <h4 class="text-white"><strong>Riwayat</strong></h4>
                            </div>
                            <div class="card-body">
                                {{-- {{ $diagnosas }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 border border-warning">
                        {{-- <div class="card-icon bg-success">
                            <i class="fas fa-envelope"></i>
                        </div> --}}
                        <div class="card-wrap">
                            <div class="card-header bg-warning">
                                <h4 class="text-white"><strong>Chat</strong></h4>
                            </div>
                            <div class="card-body">
                                {{-- {{ $pesans }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3"></div>
            </div>
        </div>
    </section>
@endsection
