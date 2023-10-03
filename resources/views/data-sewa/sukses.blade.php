@extends('layouts.app')
@section('title', 'Data Client')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pembayaran Sukses</div>

                    <div class="card-body">
                        <div class="alert alert-success">
                            Pembayaran Anda telah berhasil diproses.
                        </div>

                        <p>Detail Pembayaran:</p>
                        <ul>
                            <td>{{ $data->id }}</td>
                            <li>Jumlah Pembayaran: {{ $data->harga }}</li> {{-- Gantilah $amount dengan data sebenarnya --}}
                            <li>Tanggal Pembayaran: {{ $data->created_at }}</li> {{-- Gantilah $paymentDate dengan data sebenarnya --}}
                        </ul>

                        <a href="{{ route('data_sewa.index') }}" class="btn btn-primary">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
