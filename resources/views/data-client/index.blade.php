@extends('layouts.app')
@section('title', 'Data Client')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body border">
                        <h1 style="text-align: center" class="text-primary mb-5"><strong>Data Client</strong></h1>
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
                                                    data-update-url="{{ route('data_client.update', $item->id) }}"><i
                                                        class="ti"></i>Setujui</button>
                                                <button class="btn btn-md m-2 btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteAlertModal" data-delete-url=""><i
                                                        class="ti"></i>Tolak</button>
                                                <a href="" class="btn btn-md btn-primary m-2"><i
                                                        class="ti ti-message-2"></i>Chat</a>
                                                <a href="{{ route('data_client.contractor.progress', $item->id) }}"
                                                    class="btn btn-md btn-primary m-2"><i
                                                        class="ti ti-progress"></i>Progres</a>
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
                    <h5 class="modal-title" id="deleteAlertModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="ti ti-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulir Harga -->
                    <form id="updateForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="harga">Harga:</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ old('harga') }}">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="simpanHarga">Simpan</button>
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
    </script>
@endpush
