<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Noticia;
use App\Models\Review;
use Illuminate\Http\Request;

class TablasController extends Controller
{
    public function index()
    {
        $noticias = Noticia::all();
        $juegos = Juego::all();
        $reviews = Review::all();
        return view('tablas.index', compact('noticias', 'juegos', 'reviews'));
    }
}
