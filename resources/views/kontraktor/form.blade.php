@extends('layouts.app')
@section('title', 'Formulir')
@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body border">
                    <h1 style="text-align: center" class="text-primary mb-5"><strong>Formulir Sewa</strong></h1>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="kontraktor_id" value="{{ $kontraktor_id }}">
                        <input type="hidden" name="client_id" value="{{ $client_id }}">
                        <div class="mb-3">
                            <label for="nama_konstruksi" class="form-label">Nama Kontruksi <span class="text-danger">*<span></label>
                            <input class="form-control summernote" type="text" name="nama_konstruksi" placeholder="Nama Konstruksi" value="{{ old('nama_konstruksi') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai <span class="text-danger">*<span></label>
                            <input class="form-control summernote" type="date" name="tanggal_mulai" placeholder="Tanggal Mulai" value="{{ old('tanggal_mulai') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="luas_lahan" class="form-label">Luas Lahan (Meter) <span class="text-danger">*<span></label>
                            <input class="form-control summernote" id="luas_lahan" type="number" name="luas_lahan" placeholder="Luas Lahan" value="{{ old('luas_lahan') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="luas_bangunan" class="form-label">Luas Bangunan (Meter) <span class="text-danger">*<span></label>
                            <input class="form-control summernote" id="luas_bangunan" type="number" name="luas_bangunan" placeholder="Luas Bangunan" value="{{ old('luas_bangunan') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_bangunan" class="form-label">Alamat Bangunan <span class="text-danger">*<span></label>
                            <input class="form-control summernote" id="alamat_bangunan" type="text" name="alamat_bangunan" placeholder="Alamat Bangunan" value="{{ old('alamat_bangunan') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_ruangan" class="form-label">Jumlah Ruangan</label>
                            <input class="form-control summernote" id="jumlah_ruangan" type="number" name="jumlah_ruangan" placeholder="Jumlah Ruangan" value="{{ old('jumlah_ruangan') }}">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_ruangan" class="form-label">Keterangan Ruangan</label>
                            <textarea class="form-control summernote" id="keterangan_ruangan" rows="8" name="keterangan_ruangan" placeholder="Keterangan Ruangan">{{ old('keterangan_ruangan') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_pengerjaan" class="form-label">Jenis Pengerjaan <span class="text-danger">*<span></label>
                            <input class="form-control summernote" type="text" name="jenis_pengerjaan" placeholder="Jenis Pengerjaan" value="{{ old('jenis_pengerjaan') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control summernote" id="catatan" rows="8" name="catatan" placeholder="catatan">{{ old('catatan') }}</textarea>
                        </div>
                        <button class="btn btn-outline-primary" name="simpan" type="submit"><i class="ti ti-device-floppy">
                                Simpan</i></button>
                        <button class="btn btn-outline-danger" name="simpan" type="submit"><i class="ti ti-device-floppy">
                                Batal</i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection