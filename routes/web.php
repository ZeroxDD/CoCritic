<?php

use App\Http\Controllers\JuegoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TrailerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $juegos = \App\Models\Juego::all();

    $noticias = \App\Models\Noticia::orderBy('created_at', 'desc')->take(2)->get();

    $reviews = \App\Models\Review::orderBy('created_at', 'desc')->take(2)->get();

    $trailer = \App\Models\Trailer::orderBy('created_at', 'desc')->take(1)->get();


    return view('welcome')->with([
        'juegos' => $juegos,
        'noticias' => $noticias,
        'reviews' => $reviews,
        'trailer' => $trailer,
    ]);
});

Route::get('/dashboard', function () {
    $juegos = \App\Models\Juego::all();

    return view('dashboard')->with(['juegos' => $juegos]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('noticias', NoticiaController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('juegos', JuegoController::class);

Route::post('/trailers', [TrailerController::class, 'store'])->name('trailer.store');

Route::post('/juegos/store', [JuegoController::class, 'store'])->name('juegos.store');
Route::post('/juegos/create', [JuegoController::class, 'create'])->name('juegos.create');
Route::get('/search', [JuegoController::class, 'search'])->name('juegos.search');

Route::get('/tablas', [App\Http\Controllers\TablasController::class, 'index'])->name('tablas.index');

require __DIR__.'/auth.php';


