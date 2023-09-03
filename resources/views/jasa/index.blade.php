@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body border">
                        <h1 style="text-align: center" class="text-primary mb-5"><strong>Jual Jasa</strong></h1>
                        <div class="pd-5"><a href="/jasa/create" class="btn btn-md btn-primary"><i
                                    class="ti ti-clipboard-plus"> Tambah Jasa</i></a>
                        </div><br>
                        <div class="table-responsive border-bottom-dark">
                            <table class="table table-stripped">
                                <thead>
                                    <tr class="text-bold text-dark">
                                        <th>No</th>
                                        <th>Foto Kontraktor</th>
                                        <th class="col-3">Nama</th>
                                        <th class="col-3">Alamat</th>
                                        <th>Jumlah Tukang</th>
                                        <th>Riwayat Pembangunan</th>
                                        <th>Foto Pembangunan</th>
                                        <th class="col-3">Desakripsi</th>
                                        <th class="col-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <img height="100px" src="{{ '/upload/' . $item->foto_kontraktor }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->jumlah_tukang }}</td>
                                            <td>{{ $item->riwayat_pembangunan }}</td>
                                            <td>
                                                <img height="100px" src="{{ '/upload/' . $item->foto_pembangunan }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td class="modal-body">
                                                <a href="{{ route('jasa.edit', [$item->id]) }}"
                                                    class="btn btn-md btn-outline-warning"><i class="ti ti-edit"></i></a>
                                                <form onsubmit="return confirm('Yakin mau hapus data ini?')"
                                                    action="{{ route('jasa.destroy', $item->id) }}" class="d-inline"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-md btn-outline-danger" type="submit"
                                                        name="submit"><i class="ti ti-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
