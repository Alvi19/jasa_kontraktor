@extends('layouts.app')
@section('title', 'Data Client')
@section('content')
<div class="container-fluid mt-3">
    {{--
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" /> --}}
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body border">
                    <h1 style="text-align: start" class="text-primary mb-5"><strong>Data Sewa</strong></h1>
                    {{-- <div class="pd-5"><a href="/jasa/create" class="btn btn-md btn-primary"><i
                                class="ti ti-clipboard-plus"> Tambah Jasa</i></a>
                    </div><br> --}}
                    <div class="table-responsive border-bottom-dark">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <tr class="text-bold text-dark bg-gradient">
                                    <th>No</th>
                                    <th>Nama Client</th>
                                    <th class="col-3">Tanggal Mulai</th>
                                    <th class="col-3">Luas Lahan</th>
                                    <th class="col-3">Luas Bangunan</th>
                                    <th>Alamat</th>
                                    <th class="col-3">Jumlah Tukang</th>
                                    <th class="col-3">Jumlah Ruangan</th>
                                    <th class="col-3">Jenis Pengerjaan</th>
                                    <th class="col-3">Catatan</th>
                                    <th class="col-3">Harga</th>
                                    <th class="col-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->client->user->nama_lengkap }}</td>
                                    <td>{{ $item->tanggal_mulai }}</td>
                                    <td>{{ $item->luas_lahan }}</td>
                                    <td>{{ $item->luas_bangunan }}</td>
                                    <td>{{ $item->alamat_bangunan }}</td>
                                    <td>{{ $item->jumlah_tukang }}</td>
                                    <td>{{ $item->jumlah_ruangan }}</td>
                                    <td>{{ $item->jenis_pengerjaan }}</td>
                                    <td>{{ $item->catatan }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>
                                        <button class="btn btn-md m-2 btn-success" data-bs-toggle="modal"
                                            data-bs-target="#setujuiAlertModal"
                                            data-update-url="{{ route('data_client.update', $item->id) }}"
                                            data-harga="{{ $item->harga }}"
                                            data-tanggal="{{ @$item->payment->payment_date }}"
                                            data-sukses-url="{{ route('data_client.postSukses', $item->id) }}"><i
                                                class="ti"></i>Bayar</button>
                                        <a class="btn btn-md m-2 btn-primary"
                                            href="{{ route('data_client.contractor.progress', $item->id) }}"><i
                                                class="ti"></i>Riwayat</a>
                                        {{-- <button class="btn btn-md m-2 btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteAlertModal" data-delete-url=""><i
                                                class="ti"></i>Tolak</button>
                                        <a href="" class="btn btn-md btn-primary m-2"><i
                                                class="ti ti-message-2"></i>Chat</a> --}}
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
<div class="modal fade" id="setujuiAlertModal" tabindex="-1" role="dialog" aria-labelledby="setujuiAlertModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAlertModalLabel">Pembayaran</h5>
                <button type="button" class="ti ti-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label>Total Pembayaran: Rp.</label>
                        <span id="harga" class=""></span>
                    </div>
                    <div class="form-group mb-2">
                        <label>Tanggal Pembayaran :</label>
                        <span id="tanggal"></span>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a id="payment" type="submit" class="btn btn-primary" id="simpanHarga">Bayar
                        Sekarang</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script>
    $(document).ready(function() {
            $('#setujuiAlertModal').on('show.bs.modal', function(event) {
                console.log();
                // Tampilkan modal
                var button = $(event.relatedTarget);

                var updateUrl = button.data('update-url');
                var suksesUrl = button.data('sukses-url');
                var harga = button.data('harga');
                var tanggal = button.data('tanggal');

                $('#updateForm').attr('action', updateUrl);
                $('#modalHarga').modal('show');
                $('#payment').attr('href', suksesUrl);
                $('#harga').html(harga);
                $('#tanggal').html(tanggal);
            });
        });
</script>
@endpush