<?php

namespace App\Http\Controllers;

use App\Models\Kontraktor;
use App\Models\User;
use Illuminate\Http\Request;

class KontraktorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $data = Kontraktor::where('user_id', auth()->user()->id)->with('user')->first();

        return view('kontraktor.index')->with(compact('data', 'user'));
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
            'email'                  => 'required|email',
            'nama_lengkap'           => 'required',
            'alamat'                 => 'required',
            'TTL'                    => 'required',
            'no_wa'                  => 'required',
            'jenis_kelamin'          => 'required',
            'jumlah_tukang'          => 'required',
            'keterangan'             => 'required',
            'pemilik'                => 'required',
            'nama_bank'              => 'nullable',
            'rekening'               => 'nullable',
            'nik'                    => 'required',
            'foto_ktp'               => 'required',
        ]);

        $userValue = $request->only('nama_lengkap', 'no_wa', 'foto_profile', 'email');
        $kontraktorValue = $request->only('alamat', 'nik', 'foto_ktp', 'TTL', 'pemilik', 'jenis_kelamin', 'jumlah_tukang', 'keterangan', 'nama_bank', 'rekening');


        $kontraktor = Kontraktor::where('user_id', auth()->user()->id)->first();
        $user = User::find(auth()->user()->id);

        if ($request->hasFile('foto_ktp')) {
            $fotoKtp = time() . '_ktp_' . $request->file('foto_ktp')->getClientOriginalName();
            $request->file('foto_ktp')->move(public_path('upload'), $fotoKtp);

            $kontraktorValue['foto_ktp'] = $fotoKtp;
            $kontraktorValue['foto'] = $fotoKtp;
        }

        $user->update($userValue);
        if ($kontraktor) {
            $kontraktor->update($kontraktorValue);
        } else {
            $kontraktorValue['user_id'] = auth()->user()->id;

            Kontraktor::create($kontraktorValue);
        }


        return redirect()->route('kontraktor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kontraktor $kontraktor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontraktor $kontraktor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kontraktor $kontraktor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontraktor $kontraktor)
    {
        //
    }
}
