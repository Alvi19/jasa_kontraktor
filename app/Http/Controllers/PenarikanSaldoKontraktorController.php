<?php

namespace App\Http\Controllers;

use App\Models\PenarikanSaldo;
use Illuminate\Http\Request;

class PenarikanSaldoKontraktorController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $client = $user->client;

        $penghasilan = PenarikanSaldo::where('client_id', $client->id)->get();

        return view('kontraktor.penarikan-saldo.index');
    }
}
