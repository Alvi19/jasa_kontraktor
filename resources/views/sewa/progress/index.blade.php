@extends('layouts.app')
@section('title', 'Progress')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <h2>Riwayat Progres Kerja Kontraktor</h2>
            <nav class="" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="font-italic mt-1"><a href="{{ route('data_client.index') }}">Riwayat Jasa</a>
                    </li>
                    <li class="ti ti-chevron-right mt-2 font-italic"><a href="">Riwayat Progress Kerja
                            Kontraktor</a></li>
                </ol>
            </nav>
            <div class="pd-5">
                @if (auth()->user()->status == 'kontraktor')
                <a href="{{ route('data_client.index') }}" class="btn btn-md btn-outline-primary mx-2 mt-2 "><i class="ti ti-arrow-back-up">
                        kembali</i></a>
                <a href="{{ route('data_client.progress.create', $id) }}" class="btn btn-md btn-primary mx-2 mt-2"><i class="ti ti-clipboard-plus">
                        Create Progress</i></a>
                @endif
                @if (auth()->user()->status == 'client')
                <a href="{{ route('data_sewa.index') }}" class="btn btn-md btn-outline-primary mx-2 mt-2 "><i class="ti ti-arrow-back-up">
                        kembali</i></a>
                @endif
            </div>
            <div class="table-responsive border-bottom-dark">
                <table class="table table-bordered table-stripped table-hover mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            @if (auth()->user()->status == 'kontraktor')
                            <th>Aksi</th>
                            @endif
                            {{-- <th>Persentase Selesai</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{ $item->deskripsi }}</td>
                            <td>
                                <img height="80px" src="{{ '/upload/' . $item->gambar }}" alt="">
                            </td>
                            @if (auth()->user()->status == 'kontraktor')
                            <td>
                                <a href="{{ route('data_client.progress.edit', [$id, $item->id]) }}" class="btn btn-md btn-warning mb-1"><i class="ti ti-edit"></i></a>
                                <button class="btn btn-md btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAlertModal" data-delete-url="{{ route('data_client.progress.destroy', [$id, $item->id]) }}"><i class="ti ti-trash"></i></button>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-between"> --}}
                {{-- {{ $data->links('pagination::bootstrap-5') }} --}}
                {{-- <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li> --}}
                {{--
                    </ul>
                </nav> --}}
            </div>
        </div>
    </div>
</div>

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
                <form id="deleteForm" action="" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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