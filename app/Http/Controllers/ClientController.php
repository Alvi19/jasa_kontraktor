<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Client::where('user_id', auth()->user()->id)->with('user')->first();
        $user = Auth::user();

        return view('client.index')->with(compact('data', 'user'));
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
            'alamat'                 => 'required',
            'ttl'                    => 'required',
            'jenis_kelamin'          => 'required',
        ]);

        $userValue = $request->only('nama_lengkap', 'no_wa', 'foto_profile', 'email');
        $clientValue = $request->only('alamat', 'ttl', 'jenis_kelamin');


        $client = Client::where('user_id', auth()->user()->id)->first();
        $user = User::find(auth()->user()->id);

        $user->update($userValue);
        if ($client) {
            $client->update($clientValue);
        } else {
            $clientValue['user_id'] = auth()->user()->id;
            $clientValue['foto'] = auth()->user()->id;

            Client::create($clientValue);
        }



        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
