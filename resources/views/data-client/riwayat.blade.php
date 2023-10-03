@extends('layouts.app')
@section('title', 'Progress')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Riwayat Progres Kerja Kontraktor</h2>
                <div class="pd-5"><a href="/data-client/{{ $id }}/progress/create"
                        class="btn btn-md btn-primary"><i class="ti ti-clipboard-plus">
                            Create Progress</i></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                            {{-- <th>Persentase Selesai</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    <img height="80px" src="{{ '/upload/' . $item->gambar }}" alt="">
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
