<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jasa::all();

        return view('jasa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jasa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'nama'               => 'required',
            'alamat'             => 'required',
            'jumlah_tukang'      => 'required',
            'riwayat_pembangunan' => 'required',
            'deskripsi'          => 'required'
        ]);

        $file = $request->file('foto_kontraktor');
        $file = $request->file('foto_pembangunan');
        $gambar = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload'), $gambar);

        $validatedData['foto_kontraktor'] = $gambar;
        $validatedData['foto_pembangunan'] = $gambar;

        Jasa::create($validatedData);

        return redirect()->route('jasa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jasa $jasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Jasa::find($id);
        return view('jasa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jasa $jasa)
    {
        $validatedData = $this->validate($request, [
            'nama'               => 'required',
            'alamat'             => 'required',
            'jumlah_tukang'      => 'required',
            'riwayat_pembangunan' => 'required',
            'deskripsi'          => 'required'
        ]);

        Jasa::find($jasa->id)->update($validatedData);

        if ($request->hasFile('foto_kontraktor')) {
            $fotoKontraktor = time() . '_kontraktor_' . $request->file('foto_kontraktor')->getClientOriginalName();
            $request->file('foto_kontraktor')->move(public_path('upload'), $fotoKontraktor);
            $jasa->foto_kontraktor = $fotoKontraktor;
        }

        if ($request->hasFile('foto_pembangunan')) {
            $fotoPembangunan = time() . '_pembangunan_' . $request->file('foto_pembangunan')->getClientOriginalName();
            $request->file('foto_pembangunan')->move(public_path('upload'), $fotoPembangunan);
            $jasa->foto_pembangunan = $fotoPembangunan;
        }

        $jasa->save();

        return redirect()->route('jasa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jasa $jasa)
    {
        $data  = Jasa::find($jasa->id);
        $data->delete();

        return redirect()->route('jasa.index');
    }
}
