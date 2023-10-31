<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Progress;
use Illuminate\Http\Request;

class BangunanProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Bangunan $bangunan)
    {
        $id = $bangunan->id;
        $data = $bangunan->progress()->paginate(10);
        return view('sewa.progress.index', compact('id', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Bangunan $bangunan)
    {
        $id = $bangunan->id;

        return view('sewa.progress.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Bangunan $bangunan)
    {
        $validatedData = $this->validate($request, [
            'tanggal'             => 'required',
            'deskripsi'          => 'required'
        ]);

        $file = $request->file('gambar');
        $gambar = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload'), $gambar);

        $validatedData['gambar'] = $gambar;

        $bangunan->progress()->create($validatedData);

        return redirect()->route('data_client.progress.index', compact('bangunan'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Bangunan $id)
    {
        $data = Progress::paginate(10);
        return view('sewa.progress.riwayat', compact('id', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, string $idprogress)
    {
        $data = Progress::find($idprogress);
        return view('sewa.progress.edit')->with(compact('data', 'id', 'idprogress'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bangunan $bangunan, Progress $progress)
    {
        $validatedData = $this->validate($request, [
            'tanggal'               => 'required',
            'deskripsi'          => 'required'
        ]);

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

        return redirect()->route('data_client.progress.index', compact('bangunan'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bangunan $bangunan, Progress $progress)
    {
        $imagePath = public_path('upload/' . $progress->gambar);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $progress->delete();

        return redirect()->route('data_client.progress.index', compact('bangunan'));
    }
}
