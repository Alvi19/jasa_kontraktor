<?php

namespace App\Http\Controllers;

use App\Models\BangunanTagihan;
use Illuminate\Http\Request;

class PenghasilanController extends Controller
{
    public function index()
    {
        $kontraktor_id = auth('web')->user()->kontraktor->id;
        $tagihan_dibayar = BangunanTagihan::with('bangunan')
            ->whereHas('bangunan', function ($query) use ($kontraktor_id) {
                $query->where('kontraktor_id', $kontraktor_id);
            })->where('status', 'dibayar')->get();

        return view('penghasilan.index', compact('tagihan_dibayar'));
    }


    public function create()
    {
        
    }
}
