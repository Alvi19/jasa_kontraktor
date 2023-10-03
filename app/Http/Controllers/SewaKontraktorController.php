<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Kontraktor;
use App\Models\SewaKontraktor;
use Illuminate\Http\Request;

class SewaKontraktorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontraktors = Jasa::all();

        return view('kontraktor.sewakontraktor',  compact('kontraktors'));
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
    public function show(String $id)
    {
        $kontraktors = Jasa::find($id);
        return view('kontraktor.detailkontraktor', compact('kontraktors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SewaKontraktor $sewaKontraktor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SewaKontraktor $sewaKontraktor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SewaKontraktor $sewaKontraktor)
    {
        //
    }
}
