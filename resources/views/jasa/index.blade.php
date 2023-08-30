@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align: center" class="text-primary">Jual Jasa</h1>
                        <div class="pd-5"><a href="/jasa/create" class="btn btn-md btn-primary"><i
                                    class="ti ti-clipboard-plus"> Tambah Jasa</i></a>
                        </div><br>
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                    <tr class="text-bold text-dark">
                                        <th>No</th>
                                        <th class="col-2">Nama Jasa</th>
                                        <th>Harga</th>
                                        <th>Desakripsi</th>
                                        <th class="col-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                <a href="{{ route('jasa.edit', [$item->id]) }}"
                                                    class="btn btn-md btn-warning"><i class="ti ti-edit"></i></a>
                                                <form onsubmit="return confirm('Yakin mau hapus data ini?')"
                                                    action="{{ route('jasa.destroy', $item->id) }}" class="d-inline"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-md btn-danger" type="submit" name="submit"><i
                                                            class="ti ti-trash"></i></button>
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
