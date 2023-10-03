<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Payment;
use Illuminate\Http\Request;

class DataSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bangunan::where('client_id', auth()->user()->client->id)->get();
        return view('data-sewa.index', compact('data'));
    }

    public function suksesPayment($id)
    {
        $data = Bangunan::find($id);
        // dd($data);
        return view('data-sewa.sukses', compact('data'));
    }

    public function postSuksesPayment($id)
    {
        $data = Bangunan::find($id);
        // dd($data);
        Payment::create([
            'bangunan_id' => $id,
            'amount' => $data->harga,
            'payment_date' => now(),
        ]);


        return redirect()->route('data_client.sukses', $id);
    }

    // public function contractorProgress()
    // {
    //     return view('data-sewa.riwayat');
    // }

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
