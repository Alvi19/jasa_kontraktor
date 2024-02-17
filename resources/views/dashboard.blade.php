@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<section class="section">
    <div class="section-header">
        <h1 class=""><strong>Dashboard</strong></h1>
        <hr class="my-2 py-1">
    </div>
    <h3 class="">Selamat Datang </h3>
    <h1 class="font-weight-bold font-weight-300 py-1"><strong>{{ auth()->user()->nama_lengkap }}</strong></h1>
    <div class="section-body py-5">
        @if (auth()->user()->status == 'admin')
        <div class="row">
            <div class="col-4 ">
                <div class="card">
                    <div class="card-body">
                        <strong>Total Penghasilan</strong>
                        <h4>Rp{{ number_format($penghasilan_total,0,',','.') }}</h4>
                    </div>
                </div>
            </div>

            <a href="{{ route('admin.pembayaran.index') }}" class="col-4 ">
                <div class="card">
                    <div class="card-body">
                        <strong>Total Pembayaran ke Kontraktor</strong>
                        <h4>Rp{{ number_format($pembayaran,0,',','.') }}</h4>
                    </div>
                </div>
            </a>


            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Riwayat Penghasilan</h3>
                        <div class="table-responsive border-bottom-dark">
                            <table class="table table-bordered table-stripped table-hover m-0">
                                <thead>
                                    <tr class="text-bold text-light bg-primary">
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah Pendapatan</th>
                                        <th>Proyek</th>
                                        <th>Client</th>
                                        <th>kontraktor</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1 ?>
                                    @foreach ($penghasilan as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>Rp{{ number_format(($item->harga * 0.01),0,',','.') }}</td>
                                        <td><a href="/data-client/{{$item->bangunan->id}}/progress">{{ $item->bangunan->nama_konstruksi }}</a></td>
                                        <td><a href="/profile/client/{{$item->bangunan->client_id}}">{{ $item->bangunan->client->user->nama_lengkap }}</a></td>
                                        <td><a href="/profile/kontraktor/{{$item->bangunan->kontraktor_id}}">{{ $item->bangunan->kontraktor->user->nama_lengkap }}</a></td>
                                        <td>{{ $item->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- <div class="row">
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
            </div> -->
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3"></div>
        </div>
    </div>
</section>
@endsection