@extends('layouts.app')
@section('title', 'Edit Tagihan Pembangunan' . $bangunan->nama_konstruksi)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Tagihan Pembangunan {{$bangunan->nama_konstruksi}}</h2>
            <div class="pb-3"><a href="{{route('data_client.tagihan.index', $bangunan)}}" class="btn btn-secondary">
                    <i class="ti ti-arrow-back-up">
                        Kembali</i></a>
            </div>
            <form action="{{ route('data_client.tagihan.update', [$bangunan, $data]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_tagihan" class="form-label">Nama Tagihan</label>
                    <input class="form-control summernote" id="nama_tagihan" name="nama_tagihan"
                        placeholder="nama_tagihan" value="{{ old('nama_tagihan') ?? $data->nama_tagihan }}" />
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Biaya</label>
                    <input class="form-control summernote" id="harga" type="number" name="harga" placeholder="harga"
                        value="{{old('harga') ?? $data->harga }}">
                </div> <button class="btn btn-secondary mt-2" type="submit"><i class="ti ti-device-floppy">
                        Simpan</i></button>
            </form>
        </div>
    </div>
</div>
@endsection