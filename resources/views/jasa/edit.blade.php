@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align: center" class="text-primary">Edit Jual Jasa</h1>
                        <div class="pb-3"><a href="{{ route('jasa.index') }}" class="btn btn-secondary">
                                <i class="ti ti-arrow-back-up">
                                    Kembali</i></a>
                        </div>
                        <form action="{{ route('jasa.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input class="form-control summernote" type="text" name="nama" placeholder="Nama"
                                    value="{{ $data->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input class="form-control summernote" type="number" name="harga" placeholder="Harga"
                                    value="{{ $data->harga }}">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control summernote" rows="8" name="deskripsi" placeholder="deskripsi">{{ $data->deskripsi }}</textarea>
                            </div>
                            <button class="btn btn-primary" name="simpan" type="submit"><i class="ti ti-device-floppy">
                                    Simpan</i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
