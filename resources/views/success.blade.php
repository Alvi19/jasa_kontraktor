@extends('layouts.app')
@section('title', 'Pembayaran Berhasil')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PEMBAYARAN BERHASIL</div>

                <div class="card-body">
                    <div class="alert alert-success">
                        Pembayaran Anda telah berhasil diproses.
                    </div>

                    <p>Detail Pembayaran:</p>
                    <ul>
                        <td>Nama : {{ auth()->user()->nama_lengkap }}</td>
                        <li>Total Pembayaran : {{ $tagihan->harga }}</li> {{-- Gantilah $amount dengan data sebenarnya
                        --}}
                        <li>Tanggal Pembayaran : {{ $tagihan->created_at }}</li> {{-- Gantilah $paymentDate dengan data
                        sebenarnya --}}
                    </ul>

                    <a href="{{ route('data_sewa.tagihan.index', $bangunan) }}" class="btn btn-primary">Kembali ke
                        List Tagihan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection