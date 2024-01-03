@extends('layouts.app')
@section('title', 'Kontraktor')

@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body">
                    <h1 style="text-align:center" class="text-primary mb-4"><strong>Data Client</strong></h1>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control summernote" type="text" name="username" placeholder="Username" value="{{ old('username') ?? @$user->username }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control summernote" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input class="form-control summernote" type="text" name="nama_lengkap" placeholder="Nama" value="{{ old('nama_lengkap') ?? @$user->nama_lengkap }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" class="form-control summernote" type="email" name="email" placeholder="Email" value="{{ old('email') ?? @$user->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control summernote" rows="8" name="alamat" placeholder="Alamat">{{ old('alamat') ?? @$data->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
                            <input class="form-control summernote" type="text" name="ttl" placeholder="Tempat, Tanggal Lahir" value="{{ old('ttl') ?? @$data->ttl }}">
                        </div>
                        <div class="mb-3">
                            <label for="no_wa" class="form-label">WhatsApp</label>
                            <input class="form-control summernote" type="number" name="no_wa" placeholder="Whatsapp" value="{{ old('whatsApp') ?? @$user->no_wa }}">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                <option disabled>Jenis Kelmain</option>
                                <option value="laki-laki" {{ old('jenis_kelamin') ?? @$data->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                    Laki-Laki</option>
                                <option value="perempuan" {{ old('jenis_kelamin') ?? @$data->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="form-label">Foto</label>
                            <input type="file" class="form-control form-control-sm" name="file" id="exampleInputEmail1" value="{{ old('foto') ?? @$data->foto }}">
                        </div>

                        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection