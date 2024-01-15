@extends('layouts.app')
@section('title', 'Kontraktor')

@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col card-wrapper">
            <h2>Pembayaran Admin ke Kontraktor</h2>
            <div class="card p-4">
                <div class="table-responsive border-bottom-dark">
                    <table class="table table-bordered table-stripped table-hover mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Proyek</th>
                                <th>Client</th>
                                <th>Kontraktor</th>
                                <th>Tagihan</th>
                                <th>Tanggal</th>
                                <th>Biaya</th>
                                <th>Status</th>
                                <th>Bukti Transfer Admin</th>
                                <th>Aksi</th>
                                {{-- <th>Persentase Selesai</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($tagihan as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->bangunan->nama_konstruksi }}</td>
                                <td>{{ $item->bangunan->client->user->nama_lengkap }}</td>
                                <td>{{ $item->bangunan->kontraktor->user->nama_lengkap }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->nama_tagihan }}</td>
                                <td>Rp{{ number_format($item->harga,0,',','.') }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    @if ($item->foto_transfer_admin)
                                    <a href="{{ asset('upload/foto_transfer_admin/' . $item->foto_transfer_admin) }}" target="_blank">Lihat</a>
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 'dibayar')
                                    <button class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#kirimDanaModal" data-nominal="{{number_format($item->harga - ($item->harga * 0.01),0,',','.')}}" data-kirim-url="{{ route('data_client.tagihan.kirim', [$item->bangunan, $item->id]) }}">Kirim Dana</button>
                                    @else
                                    <button disabled class="btn btn-md btn-success">Kirim Dana</button>
                                    @endif
                                </td>
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
</div>

<!-- Alert Modal -->
<div class="modal fade" id="kirimDanaModal" tabindex="-1" role="dialog" aria-labelledby="kirimDanaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kirimDanaModalLabel">Kirim Bukti Transfer</h5>
                <button type="button" class="fa fa-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulir Harga -->
                <div class="mb-2">
                    Jumlah Nominal yang perlu ditransfer oleh admin
                    <h5 class="modal-title" id="kirimDanaModalLabel">Rp<span id="nominal"></span></h5>
                </div>

                <form id="updateForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="harga">Foto Bukti Transfer:</label>
                        <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto') }}" required accept="image/*">
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
        $('#kirimDanaModal').on('show.bs.modal', function(event) {
            // Tampilkan modal
            var button = $(event.relatedTarget); // Tombol yang membuka modal

            var updateUrl = button.data('kirim-url');
            var nominal = button.data('nominal');

            $('#nominal').html(nominal);
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