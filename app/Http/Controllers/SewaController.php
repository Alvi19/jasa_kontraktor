<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = auth()->user()->status;
        if ($role == 'kontraktor') {
            $data = Bangunan::where('kontraktor_id', auth()->user()->kontraktor->id)->get();
        } else if ($role == 'client') {
            $data = Bangunan::where('client_id', auth()->user()->client->id)->get();
        }
        return view('sewa.index', compact('data'));
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
    public function show(Bangunan $bangunan)
    {
        // echo "asd";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bangunan $bangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bangunan $bangunan)
    {
        $data = $request->validate([
            'harga' => 'required',
            'dp_awal' => 'required',
        ]);

        $bangunan->update([
            'harga' => $data['harga'],
            'status' => 'proses'
        ]);
        $bangunan->tagihan()->create([
            'nama_tagihan' => 'DP Awal',
            'harga' => $data['dp_awal'],
        ]);

        return redirect()->route('data_client.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bangunan $bangunan)
    {
        //
    }
}
