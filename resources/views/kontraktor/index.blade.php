@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align:left" class="text-primary">Data Kontraktor</h1>
                        {{-- <div class="pb-3"><a href="" class="btn btn-secondary">
                                << Kembali</a>
                        </div> --}}
                        <form action="" method="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control summernote" type="text" name="username"
                                    placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Jenis Kelmain</option>
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control summernote" type="text" name="email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="whatsapp" class="form-label">WhatsApp</label>
                                <input class="form-control summernote" type="number" name="whatsapp"
                                    placeholder="Whatsapp">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_tukang" class="form-label">Jumlah Tukang</label>
                                <input class="form-control summernote" type="number" name="jumlah_tukang"
                                    placeholder="Jumlah Tukang">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control summernote" rows="5" name="alamat" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="form-label">Foto</label>
                                <input type="file" class="form-control form-control-sm" name="file"
                                    id="exampleInputEmail1" value="">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control summernote" rows="8" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                            <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
