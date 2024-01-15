<?php

namespace App\Http\Controllers;

use App\Models\BangunanTagihan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->status == 'admin') {
            $penghasilan = BangunanTagihan::whereIn('status', ['dibayar', 'selesai'])->get();
            $penghasilan_total = ($penghasilan->sum('harga') * 0.01);

            $pembayaran = BangunanTagihan::whereIn('status', ['dibayar'])->get();
            $pembayaran = $pembayaran->sum('harga') - ($pembayaran->sum('harga') * 0.01);
            return view('dashboard', compact('penghasilan', 'penghasilan_total', 'pembayaran'));
        }
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
