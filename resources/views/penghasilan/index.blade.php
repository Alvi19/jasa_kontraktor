@extends('layouts.app')
@section('title', 'Penghasilan')
@section('content')

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body border">
                    <div class="container-fluid mt-2">
                        <h1 style="text-align: start" class="text-primary mb-3 "><strong>Penghasilan</strong></h1>
                        <hr class="my-2">
                        <nav class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="font-italic"><a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="ti ti-chevron-right mt-1" />
                                <li class="font-italic"><a href="">Penghasilan</a></li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-4 ">
                                <div class="card">
                                    <div class="card-body">
                                        <strong>Saldo</strong>
                                        <h4>Rp{{$saldo}}</h4>
                                        <button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#tarikSaldoAlertModal">Tarik Saldo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <h3>Riwayat Pendapatan</h3>
                                <div class="table-responsive border-bottom-dark">
                                    <table class="table table-bordered table-stripped table-hover m-0">
                                        <thead>
                                            <tr class="text-bold text-light bg-primary">
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah Pendapatan</th>
                                                <th>Bangunan</th>
                                                <th>Client</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $i = 1 ?>
                                            @foreach ($tagihan_dibayar as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>Rp{{ $item->harga - ($item->harga * 0.05) }}</td>
                                                <td>{{ $item->bangunan->nama_konstruksi }}</td>
                                                <td>{{ $item->bangunan->client->user->nama_lengkap }}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3>Riwayat Tarik Saldo</h3>
                                <div class="table-responsive border-bottom-dark">
                                    <table class="table table-bordered table-stripped table-hover m-0">
                                        <thead>
                                            <tr class="text-bold text-light bg-primary">
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah Penarikan</th>
                                                <th>Status / Photo</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $i = 1 ?>
                                            @foreach ($penarikan_saldo as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>Rp{{ $item->nominal }}</td>
                                                <td>
                                                    @if ($item->status == 'Pending')
                                                    <span class="btn btn-sm btn-warning">Pending</span>
                                                    @elseif ($item->status == 'Sukses')
                                                    <span class="btn btn-sm btn-success">Sukses</span>
                                                    @else
                                                    <span class="btn btn-sm btn-danger">Gagal</span>
                                                    @endif
                                                    @if ($item->photo)
                                                    <a href="{{ asset('upload/' . $item->photo) }}" target="_blank">
                                                        <img src="{{ asset('upload/' . $item->photo) }}" alt="Photo" width="100">
                                                    </a>
                                                    @else
                                                    <span class="badge badge-danger">Belum Upload</span>
                                                    @endif
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
        </div>
    </div>
</div>

<!-- Alert Modal -->
<div class="modal fade" id="tarikSaldoAlertModal" tabindex="-1" role="dialog" aria-labelledby="tarikSaldoAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tarikSaldoAlertModalLabel">Penarikan Saldo</h5>
                <button type="button" class="fa fa-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulir Harga -->
                <form action="{{ route('penghasilan.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="nominal">Nominal Penarikan:</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" value="{{ old('harga') }}">
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection