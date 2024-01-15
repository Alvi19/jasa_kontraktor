<?php

namespace App\Http\Controllers;

use App\Models\BangunanTagihan;
use App\Models\PenarikanSaldo;
use Illuminate\Http\Request;

class PenghasilanController extends Controller
{
    public function index()
    {
        $kontraktor_id = @auth('web')->user()->kontraktor->id;
        $tagihan_dibayar = BangunanTagihan::with('bangunan')
            ->whereHas('bangunan', function ($query) use ($kontraktor_id) {
                $query->where('kontraktor_id', $kontraktor_id);
            })->where('status', 'dibayar')->get();

        $saldo = ($tagihan_dibayar->sum('harga') - ($tagihan_dibayar->sum('harga') * 0.01));

        return view('penghasilan.index', compact('saldo', 'tagihan_dibayar'));
    }


    public function store()
    {
        $data = request()->validate([
            'nominal' => 'required|numeric'
        ]);

        $kontraktor_id = auth('web')->user()->kontraktor->id;
        $tagihan_dibayar = BangunanTagihan::with('bangunan')
            ->whereHas('bangunan', function ($query) use ($kontraktor_id) {
                $query->where('kontraktor_id', $kontraktor_id);
            })->where('status', 'dibayar')->get();

        $penarikan_saldo_sukses = PenarikanSaldo::where('kontraktor_id', $kontraktor_id)
            ->whereIn(
                'status',
                ['Sukses', 'Pending']
            )->selectRaw('sum(nominal) as nominal')->first();

        $saldo = ($tagihan_dibayar->sum('harga') - ($tagihan_dibayar->sum('harga') * 0.01)) - $penarikan_saldo_sukses->nominal;

        if ($data['nominal'] > $saldo) {
            return redirect()->route('penghasilan.index')->withError('Saldo tidak mencukupi');
        }

        PenarikanSaldo::create([
            'kontraktor_id' => $kontraktor_id,
            'nominal' => $data['nominal']
        ]);

        return redirect()->route('penghasilan.index')->withSuccess('Penarikan saldo berhasil dilakukan');
    }
}
