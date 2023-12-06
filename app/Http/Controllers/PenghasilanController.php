<?php

namespace App\Http\Controllers;

use App\Models\BangunanTagihan;
use App\Models\PenarikanSaldo;
use Illuminate\Http\Request;

class PenghasilanController extends Controller
{
    public function index()
    {
        $kontraktor_id = auth('web')->user()->kontraktor->id;
        $tagihan_dibayar = BangunanTagihan::with('bangunan')
            ->whereHas('bangunan', function ($query) use ($kontraktor_id) {
                $query->where('kontraktor_id', $kontraktor_id);
            })->where('status', 'dibayar')->get();

        $penarikan_saldo = PenarikanSaldo::where('kontraktor_id', $kontraktor_id)->get();

        $saldo = ($tagihan_dibayar->sum('harga') - ($tagihan_dibayar->sum('harga') * 0.05)) - $penarikan_saldo->sum('nominal');

        return view('penghasilan.index', compact('saldo', 'tagihan_dibayar', 'penarikan_saldo'));
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

        $penarikan_saldo = PenarikanSaldo::where('kontraktor_id', $kontraktor_id)->get();

        $saldo = ($tagihan_dibayar->sum('harga') - ($tagihan_dibayar->sum('harga') * 0.05)) - $penarikan_saldo->sum('nominal');

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
