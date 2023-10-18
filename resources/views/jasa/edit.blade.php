@extends('layouts.app')
@section('title', 'Edit Jasa')
@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body border">
                        <h1 style="text-align: start" class=" mb-2"><strong>Edit Jual Jasa</strong></h1>
                        <hr class="my-2">
                        <nav class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="font-italic"><a href="{{ route('jasa.index') }}">Jual Jasa</a>
                                </li>
                                <li class="ti ti-chevron-right mt-1 font-italic"><a href="">Edit Jual Jasa</a></li>
                            </ol>
                        </nav>
                        <div class="pb-3"><a href="{{ route('jasa.index') }}" class="btn btn-secondary">
                                <i class="ti ti-arrow-back-up">
                                    Kembali</i></a>
                        </div>
                        <form action="{{ route('jasa.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="foto_kontraktor" class="form-grup">Foto Kontraktor</label>
                                <input type="file" class="form-control form-control-sm" name="foto_kontraktor"
                                    id="foto_kontraktor" value="{{ $data->file }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input class="form-control summernote" type="text" name="nama" placeholder="Nama"
                                    value="{{ $data->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input class="form-control summernote" id="alamat" type="text" name="alamat"
                                    placeholder="Alamat" value="{{ $data->alamat }}">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_tukang" class="form-label">Jumlah Tukang</label>
                                <input class="form-control summernote" id="jumlah_tukang" type="number"
                                    name="jumlah_tukang" placeholder="Jumlah Tukang" value="{{ $data->jumlah_tukang }}">
                            </div>
                            <div class="mb-3">
                                <label for="riwayat_pembangunan" class="form-label">Riwayat Pembangunan</label>
                                <textarea class="form-control summernote" rows="8" id="riwayat_pembangunan" name="riwayat_pembangunan"
                                    placeholder="Riwayat Pembangunan">{{ $data->riwayat_pembangunan }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto_pembangunan" class="form-grup">Foto Pembangunan</label>
                                <input type="file" class="form-control form-control-sm" name="foto_pembangunan"
                                    id="foto_pembangunan" value="{{ $data->foto_pembangunan }}">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control summernote" id="deskripsi" rows="8" name="deskripsi" placeholder="deskripsi">{{ $data->deskripsi }}</textarea>
                            </div>
                            <button class="btn btn-outline-primary" name="simpan" type="submit"><i
                                    class="ti ti-device-floppy">
                                    Simpan</i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
