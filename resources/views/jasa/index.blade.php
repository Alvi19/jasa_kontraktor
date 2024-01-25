@extends('layouts.app')
@section('title', 'Index')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body border">
                    <h1 style="text-align: start" class="text-primary mb-3 "><strong>Jual Jasa</strong></h1>
                    <hr class="my-3">
                    <div class="pd-5"><a href="/jasa/create" class="btn btn-md btn-primary"><i class="ti ti-clipboard-plus"> Tambah Jasa</i></a>
                    </div><br>
                    <div class="table-responsive border-bottom-dark">
                        <table class="table table-bordered table-stripped table-hover m-0">
                            <thead>
                                <tr class="text-bold text-dark bg-gradient">
                                    <th>No</th>
                                    <th>Foto Kontraktor</th>
                                    <th>Nama Kontraktor</th>
                                    <th>Nama Pembangunan</th>
                                    <th class="col-3">Alamat</th>
                                    <th>Jumlah Tukang</th>
                                    <th class="col-5">Riwayat Pembangunan</th>
                                    <th>Foto Pembangunan</th>
                                    <th class="col-6">Desakripsi</th>
                                    <th class="col-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <img height="80px" src="{{ '/upload/' . $item->foto_kontraktor }}" alt="">
                                    </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nama_pembangunan }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->jumlah_tukang }}</td>
                                    <td>{{ $item->riwayat_pembangunan }}</td>
                                    <td>
                                        <img height="80px" src="{{ '/upload/' . $item->foto_pembangunan }}" alt="">
                                    </td>
                                    <td>{!! $item->deskripsi !!}</td>
                                    <td>
                                        <a href="{{ route('jasa.edit', [$item->id]) }}" class="btn btn-md btn-warning mb-1"><i class="ti ti-edit"></i></a>
                                        <button class="btn btn-md btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAlertModal" data-delete-url="{{ route('jasa.destroy', $item->id) }}"><i class="ti ti-trash"></i></button>
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
<!-- Alert Modal -->
<div class="modal fade" id="deleteAlertModal" tabindex="-1" role="dialog" aria-labelledby="deleteAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAlertModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="ti ti-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" action="" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script>
    $(document).ready(function() {
        $('#deleteAlertModal').on('show.bs.modal', function(event) {
            console.log();
            var button = $(event.relatedTarget); // Tombol yang membuka modal
            var deleteUrl = button.data('delete-url');

            $('#deleteForm').attr('action', deleteUrl);
        });
    });
</script>
@endpush