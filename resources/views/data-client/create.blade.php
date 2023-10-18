@extends('layouts.app')
@section('title', 'Create Progress')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Create Progress</h2>
                <div class="pb-3"><a href="/data_client/{{ $id }}/contractor-progress" class="btn btn-primary">
                        <i class="ti ti-arrow-back-up">
                            Kembali</i></a>
                </div>
                <form action="{{ route('data_client.progress.store', $id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control summernote" id="deskripsi" rows="8" name="deskripsi" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input class="form-control summernote" type="date" name="tanggal" placeholder="Tanggal"
                            value="{{ old('tanggal') }}">
                    </div>
                    <div class="form-group">
                        <label for="foto" class="form-grup">Foto</label>
                        <input type="file" class="form-control form-control-sm" name="gambar" id="gambar"
                            value="{{ old('gambar') }}">
                    </div>
                    <button class="btn btn-secondary mt-2" name="simpan" type="submit"><i class="ti ti-device-floppy">
                            Simpan</i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
