@extends('layouts.app')
@section('title', 'Pembayaran Gagal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PEMBAYARAN GAGAL</div>

                <div class="card-body">
                    <div class="alert alert-danger">
                        Pembayaran Anda gagal diproses.
                    </div>

                    <p>Detail Pembayaran:</p>
                    <ul>
                        <td>Nama : {{ auth()->user()->nama_lengkap }}</td>
                        <li>Total Pembayaran : {{ $tagihan->harga }}</li> {{-- Gantilah $amount dengan data sebenarnya
                        --}}
                    </ul>

                    <a href="{{ route('data_sewa.tagihan.index', $bangunan) }}" class="btn btn-primary">Kembali ke
                        List Tagihan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection