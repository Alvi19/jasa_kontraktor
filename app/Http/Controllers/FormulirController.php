<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Formulir;
use App\Models\Jasa;
use App\Models\User;
use Illuminate\Http\Request;

class FormulirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validatedData = $this->validate($request, [
            'kontraktor_id' => 'required',
            'client_id' => 'required',
            'nama_konstruksi' => 'required',
            'tanggal_mulai' => 'required',
            'luas_lahan' => 'required',
            'luas_bangunan' => 'required',
            'alamat_bangunan' => 'required',
            'jumlah_tukang' => 'required',
            'jumlah_ruangan' => 'nullable',
            'jumlah_unit' => 'nullable',
            'keterangan_ruangan' => 'nullable',
            'jenis_pengerjaan' => 'required',
            'catatan' => 'nullable'
        ]);

        Bangunan::create($validatedData);

        return redirect()->route('data_sewa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client_id = @auth()->user()->client->id;
        if (
            !$client_id
        ) {
            return redirect()->route('client.index')->withError('Harap isi data client terlebih dahulu');
        }
        $kontraktor_id = Jasa::find($id)->kontraktor_id;
        return view('kontraktor.form', compact('kontraktor_id', 'client_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bangunan $formulir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bangunan $formulir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bangunan $formulir)
    {
        //
    }
}
