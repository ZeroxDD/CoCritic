<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Trailer;

class TrailerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trailers = \App\Models\Trailer::all();
        return view('trailers.index', compact('trailers'));
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
        $request->validate([
            'url' => 'required|url', // Asegura que la URL sea válida
            'nombre' => 'required',
        ]);

        $trailer = new Trailer();
        $trailer->url = $request->input('url');
        $trailer->nombre = $request->input('nombre');
        $trailer->save();

        return redirect()->back()->with('success', 'Trailer añadido correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Trailer $trailer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trailer $trailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrailerRequest $request, Trailer $trailer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trailer $trailer)
    {
        //
    }
}
