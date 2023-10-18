<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = Progress::paginate(10);
        return view('data-client.riwayat', compact('id', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('data-client.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'tanggal'             => 'required',
            'deskripsi'          => 'required'
        ]);

        $file = $request->file('gambar');
        $gambar = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload'), $gambar);

        $validatedData['gambar'] = $gambar;
        $validatedData['bangunan_id'] = $id;

        Progress::create($validatedData);

        return redirect()->route('data_client.contractor.progress', compact('id'));
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
    public function edit($id, string $idprogress)
    {
        $data = Progress::find($idprogress);
        return view('data-client.edit')->with(compact('data', 'id', 'idprogress'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, string $idprogress)
    {
        $validatedData = $this->validate($request, [
            'tanggal'               => 'required',
            'deskripsi'          => 'required'
        ]);

        $progress = Progress::findOrFail($idprogress);

        if ($request->hasFile('gambar')) {
            $oldImagePath = public_path('upload/' . $progress->gambar);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $file = $request->file('gambar');
            $gambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $gambar);
            $validatedData['gambar'] = $gambar;
        }
        $progress->update($validatedData);

        return redirect()->route('data_client.contractor.progress', compact('id', 'idprogress'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, $idprogress)
    {
        $progress = Progress::findOrFail($idprogress);

        $imagePath = public_path('upload/' . $progress->gambar);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $progress->delete();

        return redirect()->route('data_client.contractor.progress', compact('id', 'idprogress'));
    }
}
