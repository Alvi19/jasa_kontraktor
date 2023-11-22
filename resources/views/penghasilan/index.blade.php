@extends('layouts.app')
@section('title', 'Penghasilan')
@section('content')

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body border">
                    <div class="container-fluid mt-2">
                        <h1 style="text-align: start" class="text-primary mb-3 "><strong>Penghasilan</strong></h1>
                        <hr class="my-2">
                        <nav class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="font-italic"><a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="ti ti-chevron-right mt-1" />
                                <li class="font-italic"><a href="">Penghasilan</a></li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-4 ">
                                <div class="card">
                                    <div class="card-body">
                                        <strong>Saldo</strong>
                                        <h4>Rp{{$tagihan_dibayar->sum('harga') - ($tagihan_dibayar->sum('harga') *
                                            0.05)}}</h4>
                                        <button class="btn btn-primary btn-sm mt-2">Tarik Saldo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <h3>Riwayat Pendapatan</h3>
                                <div class="table-responsive border-bottom-dark">
                                    <table class="table table-bordered table-stripped table-hover m-0">
                                        <thead>
                                            <tr class="text-bold text-light bg-primary">
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah Pendapatan</th>
                                                <th>Bangunan</th>
                                                <th>Client</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $i = 1 ?>
                                            @foreach ($tagihan_dibayar as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>Rp{{ $item->harga - ($item->harga * 0.05) }}</td>
                                                <td>{{ $item->bangunan->nama_konstruksi }}</td>
                                                <td>{{ $item->bangunan->client->user->nama_lengkap }}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3>Riwayat Tarik Saldo</h3>
                                <div class="table-responsive border-bottom-dark">
                                    <table class="table table-bordered table-stripped table-hover m-0">
                                        <thead>
                                            <tr class="text-bold text-light bg-primary">
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah Penarikan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $i = 1 ?>
                                            @foreach ($tagihan_dibayar as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>Rp{{ $item->harga }}</td>
                                                <td>{{ $item->bangunan->nama_konstruksi }}</td>
                                                <td>{{ $item->bangunan->client->user->nama_lengkap }}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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