<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenarikanSaldo;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penarikan_saldo = PenarikanSaldo::with('kontraktor')->get();

        return view('admin.pembayaran.index', compact('penarikan_saldo'));
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
    public function show(PenarikanSaldo $penarikanSaldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenarikanSaldo $penarikanSaldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenarikanSaldo $penarikanSaldo)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $oldImagePath = public_path('upload/' . $penarikanSaldo->photo);
            if (file_exists($oldImagePath)) {
                @unlink($oldImagePath);
            }

            $file = $request->file('photo');
            $photo = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $photo);
            $validatedData['photo'] = $photo;
        }

        $validatedData['status'] = 'Sukses';
        $penarikanSaldo->update($validatedData);

        return redirect()->route('admin.pembayaran.index')->withSuccess('Pembayaran berhasil dilakukan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenarikanSaldo $penarikanSaldo)
    {
        //
    }
}
