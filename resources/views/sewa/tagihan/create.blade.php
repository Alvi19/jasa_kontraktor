@extends('layouts.app')
@section('title', 'Buat Tagihan ' . $bangunan->nama_konstruksi)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Create Tagihan Pembangunan {{$bangunan->nama_konstruksi}}</h2>
            <div class="pb-3"><a href="{{route('data_client.tagihan.index', $bangunan)}}" class="btn btn-primary">
                    <i class="ti ti-arrow-back-up">
                        Kembali</i></a>
            </div>
            <form action="{{ route('data_client.tagihan.store', $bangunan) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_tagihan" class="form-label">Nama Tagihan</label>
                    <input class="form-control summernote" id="nama_tagihan" name="nama_tagihan" placeholder="nama_tagihan" value="{{ old('nama_tagihan') }}" />
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Biaya</label>
                    <input class="form-control summernote" id="harga" type="number" name="harga" placeholder="harga" value="{{old('harga') }}">
                    <label>Saldo yang masuk akan dipotong 1% untuk biaya admin. <br>Contoh: Rp1.000.000 - (Rp1.000.000 *
                        1%)
                        = Rp1.000.000 - Rp10.000 = Rp990.000</label>
                </div> <button class="btn btn-secondary mt-2" type="submit"><i class="ti ti-device-floppy">
                        Simpan</i></button>
            </form>
        </div>
    </div>
</div>
@endsection