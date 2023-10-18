@extends('layouts.app')
@section('title', 'Data Client')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pembayaran</div>

                    <div class="card-body">
                        {{-- <div class="alert alert-success">
                            Pembayaran Anda telah berhasil diproses.
                        </div> --}}

                        {{-- <p>Detail Pembayaran:</p> --}}

                        <a href="{{ route('data_sewa.index') }}" class="btn btn-primary">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script type="text/javascript">
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                /* You may add your own implementation here */
                alert("payment success!");
                console.log(result);
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function(result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        })
    </script>
@endpush
