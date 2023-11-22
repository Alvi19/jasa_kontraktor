@extends('layouts.app')
@section('title', 'Kontraktor')

@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body">
                    <h1 style="text-align:start" class="text-primary mb-4"><strong>Data Kontraktor</strong></h1>
                    <hr class="py-2 mb-1 my-2">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('kontraktor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control summernote" type="text" name="username" placeholder="Username"
                                value="{{ old('username') ?? @$data->user->username }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control summernote" type="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input class="form-control summernote" type="text" name="nama_lengkap" placeholder="Nama"
                                value="{{ old('nama_lengkap') ?? @$data->user->nama_lengkap }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control summernote" rows="8" name="alamat"
                                placeholder="Alamat">{{ old('alamat') ?? @$data->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="TTL" class="form-label">Tempat Tanggal Lahir</label>
                            <input class="form-control summernote" type="text" name="TTL"
                                placeholder="Tempat, Tanggal Lahir" value="{{ old('TTL') ?? @$data->TTL }}">
                        </div>
                        <div class="mb-3">
                            <label for="no_wa" class="form-label">WhatsApp</label>
                            <input class="form-control summernote" type="number" name="no_wa" placeholder="Whatsapp"
                                value="{{ old('whatsApp') ?? @$data->user->no_wa }}">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                <option disabled>Jenis Kelmain</option>
                                <option value="laki-laki" {{ old('jenis_kelamin') ?? @$data->jenis_kelamin ==
                                    'laki-laki' ? 'selected' : '' }}>
                                    Laki-Laki</option>
                                <option value="perempuan" {{ old('jenis_kelamin') ?? @$data->jenis_kelamin ==
                                    'perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="form-label">Foto</label>
                            <input type="file" class="form-control form-control-sm" name="file" id="exampleInputEmail1"
                                value="{{ old('foto') ?? @$data->foto }}">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_tukang" class="form-label">Jumlah Tukang</label>
                            <input class="form-control summernote" type="number" name="jumlah_tukang"
                                placeholder="Jumlah Tukang" value="{{ old('jumlah_tukang') ?? @$data->jumlah_tukang }}">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control summernote" rows="8" name="keterangan"
                                placeholder="Keterangan">{{ old('keterangan') ?? @$data->keterangan }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_wa" class="form-label">Nama Bank</label>
                            <input class="form-control summernote" name="nama_bank" placeholder="Contoh: BCA"
                                value="{{ old('nama_bank') ?? @$data->nama_bank }}">
                        </div>
                        <div class="mb-3">
                            <label for="no_wa" class="form-label">No. Rekening</label>
                            <input class="form-control summernote" type="number" name="rekening"
                                placeholder="Contoh: 123xxxxx" value="{{ old('rekening') ?? @$data->rekening }}">
                        </div>
                        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection