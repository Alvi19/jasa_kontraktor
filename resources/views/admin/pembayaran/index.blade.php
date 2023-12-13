@extends('layouts.app')
@section('title', 'Kontraktor')

@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body">
                    <h1 style="text-align:start" class="text-primary mb-4"><strong>Pembayaran ke Kontraktor</strong></h1>
                    <hr class="py-2 mb-1 my-2">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Kontraktor</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penarikan_saldo as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>{{ $item->kontraktor->user->nama_lengkap }}</td>
                                    <td>Rp. {{ number_format($item->nominal, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($item->status == 'Pending')
                                        <span class="btn btn-sm btn-warning">Pending</span>
                                        @elseif ($item->status == 'Sukses')
                                        <span class="btn btn-sm btn-success">Sukses</span>
                                        @else
                                        <span class="btn btn-sm btn-danger">Gagal</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->photo)
                                        <a href="{{ asset('upload/' . $item->photo) }}" target="_blank">
                                            <img src="{{ asset('upload/' . $item->photo) }}" alt="Photo" width="100">
                                        </a>
                                        @else
                                        <span class="badge badge-danger">Belum Upload</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button {{ $item->status == 'Pending' ? '' : 'disabled'  }} class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#kirimAlertModal" data-update-url="{{ route('admin.pembayaran.update', $item->id) }}">Bayar</button>
                                        <button {{ $item->status == 'Pending' ? '' : 'disabled'  }} class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#tolakAlertModal" data-update-url="{{ route('admin.pembayaran.tolak', $item->id) }}">Tolak</button>
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
<div class="modal fade" id="kirimAlertModal" tabindex="-1" role="dialog" aria-labelledby="kirimAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kirimAlertModalLabel">Konfirmasi Biaya</h5>
                <button type="button" class="fa fa-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="photo" class="form-grup">Bukti Transfer</label>
                        <input type="file" class="form-control form-control-sm" name="photo" id="photo" accept="image/*" required>
                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
                <h5 class="modal-title" id="tolakAlertModalLabel">Yakin ingin menolak Pembayaran?</h5>
                <button type="button" class="fa fa-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tolakForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Tolak</button>
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
        $('#kirimAlertModal').on('show.bs.modal', function(event) {
            // Tampilkan modal
            var button = $(event.relatedTarget); // Tombol yang membuka modal

            var updateUrl = button.data('update-url');

            $('#updateForm').attr('action', updateUrl);
        });
    });

    $(document).ready(function() {
        $('#tolakAlertModal').on('show.bs.modal', function(event) {
            // Tampilkan modal
            var button = $(event.relatedTarget); // Tombol yang membuka modal

            var updateUrl = button.data('update-url');

            $('#tolakForm').attr('action', updateUrl);
        });
    });
</script>
@endpush