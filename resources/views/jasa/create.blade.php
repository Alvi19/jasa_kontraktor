@extends('layouts.app')
@section('title', 'Create Jasa')
@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body border">
                    <h1 style="text-align: start" class=" mb-1"><strong>Tambah Jual Jasa</strong></h1>
                    <hr class="my-2">
                    <nav class="" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="font-italic breadcrumb-item "><a href="{{ route('jasa.index') }}">Jual
                                    Jasa</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Tambah Jasa</a></li>
                        </ol>
                    </nav>
                    {{-- <hr class="my-2"> --}}
                    <div class="pb-3"><a href="{{ route('jasa.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-back-up">
                                Kembali</i></a>
                    </div>
                    <form action="{{ route('jasa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="foto_kontraktor" class="form-grup">Foto Kontraktor <span class="text-danger">*<span></label>
                            <input type="file" class="form-control form-control-sm" name="foto_kontraktor" id="foto_kontraktor" value="{{ old('foto_kontraktor') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kontraktor <span class="text-danger">*<span></label>
                            <input class="form-control summernote" type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pembangunan" class="form-label">Nama Pembangunan <span class="text-danger">*<span></label>
                            <input class="form-control summernote" type="text" name="nama_pembangunan" placeholder="Nama Pembangunan" value="{{ old('nama_pembangunan') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat <span class="text-danger">*<span></label>
                            <input class="form-control summernote" id="alamat" type="text" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_tukang" class="form-label">Jumlah Tukang <span class="text-danger">*<span></label>
                            <input class="form-control summernote" id="jumlah_tukang" type="number" name="jumlah_tukang" placeholder="Jumlah Tukang" value="{{ old('jumlah_tukang') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="riwayat_pembangunan" class="form-label">Riwayat Pembangunan <span class="text-danger">*<span></label>
                            <textarea class="form-control summernote" rows="8" id="riwayat_pembangunan" name="riwayat_pembangunan" placeholder="Riwayat Pembangunan">{{ old('riwayat_pembangunan') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto_pembangunan" class="form-grup">Foto Pembangunan <span class="text-danger">*<span></label>
                            <input type="file" class="form-control form-control-sm" name="foto_pembangunan" id="foto_pembangunan" value="{{ old('foto_pembangunan') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*<span></label>
                            <textarea class="form-control summernote" id="deskripsi" rows="8" name="deskripsi" placeholder="deskripsi" required>{{ old('deskripsi') }}</textarea>
                        </div>
                        <button class="btn btn-outline-primary" name="simpan" type="submit"><i class="ti ti-device-floppy">
                                Simpan</i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection