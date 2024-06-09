<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->get('buscar') !== null) {
            $terminoBusqueda = $request->get('buscar');
            $noticias = Noticia::where('descripcion', 'like', $terminoBusqueda)->all();
        } else {
            $noticias = Noticia::all();
        }

        return view('noticias/index')->with(['noticias' => $noticias]);
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
    public function store(StoreNoticiaRequest $request)
    {
        $nuevaNoticia =[
            'user_id' => auth()->user()->getAuthIdentifier(),
            'titulo' => $request->get("titulo"),
            'descripcion' => $request->get('descripcion'),

        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('imagenes', 'public');
            $nuevaNoticia['image'] = $path;
        }

        Noticia::create($nuevaNoticia);
        return redirect()->back()->with('success', 'Noticia añadida correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();

        return redirect('/tablas')->with('success', 'Noticia eliminada correctamente.');
    }
}
