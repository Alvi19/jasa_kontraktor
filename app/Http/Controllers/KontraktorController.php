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
        $data = Kontraktor::where('user_id', auth()->user()->id)->with('user')->first();

        return view('kontraktor.index')->with('data', $data);
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
            'username'               => 'required',
            'nama_lengkap'            => 'required',
            'alamat'                 => 'required',
            'TTL'                    => 'required',
            'no_wa'                  => 'required',
            'jenis_kelamin'          => 'required',
            'jumlah_tukang'          => 'required',
            'keterangan'             => 'required',
        ]);

        $userValue = $request->only('username', 'passowrd', 'nama_lengkap', 'no_wa', 'foto_profile');
        $kontraktorValue = $request->only('alamat', 'TTL', 'email', 'jenis_kelamin', 'foto', 'jumlah_tukang', 'keterangan');


        $kontraktor = Kontraktor::where('user_id', auth()->user()->id)->first();
        $user = User::find(auth()->user()->id);

        $user->update($userValue);
        if ($kontraktor) {
            $kontraktor->update($kontraktorValue);
        } else {
            $kontraktorValue['user_id'] = auth()->user()->id;
            $kontraktorValue['foto'] = auth()->user()->id;

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
