<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use Illuminate\Http\Request;

class DataClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->user());
        if (auth()->user()->status == "kontraktor") {
            $data = Bangunan::where('kontraktor_id', auth()->user()->kontraktor->id)->get();
        } else {
            $data = Bangunan::where('client_id', auth()->user()->client->id)->get();
        }
        return view('data-client.index', compact('data'));
    }

    // public function dataClient()
    // {
    //     $breadcrumbs = [
    //         ['label' => 'Home', 'url' => route('home')],
    //         ['label' => 'Data Client', 'url' => null],
    //     ];

    //     return view('data_client', compact('breadcrumbs'));
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
    public function update(Request $request, Bangunan $data_client)
    {
        $bangunan = $data_client;
        // dd(Request::all());
        $validatedData = $this->validate($request, [
            'harga'               => 'required|numeric',
            'dp_awal'               => 'required|numeric',
        ]);

        $bangunan->harga = $validatedData['harga'];
        $bangunan->status = 'proses';
        $bangunan->save();

        $bangunan->tagihan()->create([
            'nama_tagihan' => 'DP',
            'harga' => $validatedData['dp_awal'],
        ]);

        return redirect()->route('data_client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
