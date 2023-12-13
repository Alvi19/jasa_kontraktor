@extends('layouts.app')
@section('title', 'Data Client')
@section('content')
<div class="container-fluid mt-2">
    {{--
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" /> --}}
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body border p-4">
                    <h1 style="text-align: start" class="text-primary mb-3"><strong>Data Client</strong></h1>
                    <hr class="my-0 py-2">
                    {{-- <div class="pd-5"><a href="/jasa/create" class="btn btn-md btn-primary"><i
                                class="ti ti-clipboard-plus"> Tambah Jasa</i></a>
                    </div><br> --}}
                    <div class="table-responsive border-bottom-dark">
                        <table class="table table-bordered table-stripped table-hover m-0">
                            <thead>
                                <tr class="text-bold text-dark bg-gradient">
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Konstruksi</th>
                                    <th>Client</th>
                                    <th class="col-3">Status</th>
                                    <th class="col-3">Estimasi Biaya</th>
                                    <th class="col-3">Tagihan</th>
                                    <th class="col-3">Tanggal Mulai</th>
                                    <th class="col-3">Luas Lahan</th>
                                    <th class="col-3">Luas Bangunan</th>
                                    <th class="col-3">Alamat</th>
                                    <th>Jumlah Tukang</th>
                                    <th>Jumlah Ruangan</th>
                                    <th>Jumlah Unit</th>
                                    {{-- <th class="col-3">Jenis Pengerjaan</th> --}}
                                    {{-- <th class="col-3">Catatan</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $item)
                                <tr>

                                    <td>{{ $i++ }}</td>
                                    <td>
                                        @if (auth()->user()->status == 'kontraktor')
                                        <div class="btn-group-vertical"> @if ($item->status == 'menunggu')
                                            <button class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#setujuiAlertModal" data-update-url="{{ route('data_client.update', $item->id) }}"><i class="ti"></i>Setujui</button>
                                            <button class="btn btn-md btn-danger" data-bs-toggle="modal" data-bs-target="#tolakAlertModal" data-update-url="{{ route('data_client.reject', $item->id) }}"><i class="ti"></i>Tolak</button>
                                            @endif
                                            <a href="{{ route('chat.show', ['id' => $item->client->user_id]) }}" class="btn btn-sm btn-primary"><i class="ti ti-message-2"></i>Chat</a>
                                            @if ($item->status == 'proses') <a href="{{ route('data_client.progress.index', $item->id) }}" class="btn btn-sm btn-success">Progres</a>
                                            <a href="{{ route('data_client.tagihan.index', $item->id) }}" class="btn btn-sm btn-secondary">Tagihan</a>
                                            @endif
                                        </div>
                                        @elseif (auth()->user()->status == 'client')
                                        <a href="{{ route('chat.show', ['id' => $item->kontraktor->user_id]) }}" class="btn btn-sm btn-primary"><i class="ti ti-message-2"></i>Chat</a>
                                        @if ($item->status == 'proses') <a href="{{ route('data_client.progress.index', $item->id) }}" class="btn btn-sm btn-success">Progres</a>
                                        <a href="{{ route('data_client.tagihan.index', $item->id) }}" class="btn btn-sm btn-secondary">Tagihan</a>
                                        @endif
                                        @endif
                                    </td>
                                    <td>{{ $item->nama_konstruksi }}</td>
                                    <td>{{ $item->client->user->nama_lengkap }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->totalTagihan() }}
                                        @if (auth()->user()->status == 'client' && $item->totalTagihan() > 0)
                                        <a href="{{ route('data_client.tagihan.index', $item->id) }}" class="btn btn-sm btn-secondary">Bayar</a>
                                        @endif
                                    </td>
                                    <td>{{ $item->tanggal_mulai }}</td>
                                    <td>{{ $item->luas_lahan }}</td>
                                    <td>{{ $item->luas_bangunan }}</td>
                                    <td>{{ $item->alamat_bangunan }}</td>
                                    <td>{{ $item->jumlah_tukang }}</td>
                                    <td>{{ $item->jumlah_ruangan }}</td>
                                    <td>{{ $item->jumlah_unit }}</td>
                                    {{-- <td>{{ $item->jenis_pengerjaan }}</td>
                                    <td>{{ $item->catatan }}</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{-- {{ $data->links() }} --}}
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
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Alert Modal -->
<div class="modal fade" id="setujuiAlertModal" tabindex="-1" role="dialog" aria-labelledby="setujuiAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="setujuiAlertModalLabel">Konfirmasi Biaya</h5>
                <button type="button" class="fa fa-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulir Harga -->
                <form id="updateForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="harga">Estimasi Biaya:</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="dp_awal">DP Awal Pembangunan:</label>
                        <input type="number" class="form-control" id="dp_awal" name="dp_awal" value="{{ old('dp_awal') }}">
                    </div> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tolakAlertModal" tabindex="-1" role="dialog" aria-labelledby="tolakAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tolakAlertModalLabel">Yakin Tolak Client?</h5>
                <button type="button" class="fa fa-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulir Harga -->
                <form id="tolakForm" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">YA</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script>
    // Fungsi ini akan dipanggil ketika tombol "Distujui" diklik
    $(document).ready(function() {
        $('#setujuiAlertModal').on('show.bs.modal', function(event) {
            console.log();
            // Tampilkan modal
            var button = $(event.relatedTarget); // Tombol yang membuka modal

            var updateUrl = button.data('update-url');

            $('#updateForm').attr('action', updateUrl);
            $('#modalHarga').modal('show');


            // Fungsi ini akan dipanggil saat tombol "Simpan" di dalam modal ditekan
            // $('#simpanHarga').click(function() {
            //     // Ambil nilai dari input harga
            //     var harga = $('#harga').val();

            //     // Lakukan sesuatu dengan nilai harga (misalnya, kirim ke server dengan AJAX)

            //     // Tutup modal
            //     $('#modalHarga').modal('hide');
        });
    });

    $(document).ready(function() {
        $('#tolakAlertModal').on('show.bs.modal', function(event) {
            console.log();
            // Tampilkan modal
            var button = $(event.relatedTarget); // Tombol yang membuka modal

            var updateUrl = button.data('update-url');

            $('#tolakForm').attr('action', updateUrl);
            $('#modalHarga').modal('show');


            // Fungsi ini akan dipanggil saat tombol "Simpan" di dalam modal ditekan
            // $('#simpanHarga').click(function() {
            //     // Ambil nilai dari input harga
            //     var harga = $('#harga').val();

            //     // Lakukan sesuatu dengan nilai harga (misalnya, kirim ke server dengan AJAX)

            //     // Tutup modal
            //     $('#modalHarga').modal('hide');
        });
    });
</script>
@endpush