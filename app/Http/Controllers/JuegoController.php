<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Http\Requests\StoreJuegoRequest;
use App\Http\Requests\UpdateJuegoRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $juegos = Juego::paginate(10);

        if ($request->ajax()) {
            return view('juegos.partials.items', compact('juegos'))->render();
        }

        return view('juegos.index', compact('juegos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = new Client(['verify' => false]);
        $request = new GuzzleRequest('GET', 'https://api.rawg.io/api/games?key=e32d9a49d6174a50bd84765e572817dc');
        $res = $client->sendAsync($request)->wait();
        $response = $res->getBody();

        $response = json_decode($response, true);

        if (!empty($response['results'])) {
            $juegos = $response['results'];

            foreach ($juegos as $juego) {
                if (isset($juego['platforms'][0]['platform']['name'])) {
                    $plataforma = $juego['platforms'][0]['platform']['name'];
                } else {
                    $plataforma = $juego['platform']['name'];
                }

                Juego::updateOrCreate(
                    ['external_id' => $juego['id']],
                    [
                        'titulo' => $juego['name'],
                        'fecha_de_salida' => $juego['released'],
                        'plataforma' => $plataforma,
                        'imagen' => $juego['background_image'],
                    ]
                );
            }
        }

        return redirect('/juegos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJuegoRequest $request)
    {
        $nuevoJuego = [
            'titulo' => $request->get('titulo'),
            'descripcion' => $request->get('descripcion'),
            'fecha_de_salida' => $request->get('fecha_de_salida'),
            'plataforma' => $request->get('plataforma'),
        ];

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', 'public');
            $nuevoJuego['imagen'] = $path;
        }

        Juego::create($nuevoJuego);

        return redirect()->back()->with('success', 'Juego añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Juego $juego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Juego $juego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJuegoRequest $request, Juego $juego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Juego $juego)
    {
        $juego->delete();

        return redirect('/tablas')->with('success', 'Juego eliminada correctamente.');
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $juegos = Juego::where('titulo', 'LIKE', "%{$query}%")->get();

        if ($request->ajax()) {
            return view('juegos.partials.search_results', compact('juegos'))->render();
        }

        return view('juegos.index', compact('juegos'));
    }

}
