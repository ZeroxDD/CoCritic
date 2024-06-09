<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CoCritic</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- Scripts & CSS-->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
    <body class="antialiased">
    <nav class="navbar">
        <div class="left-section">
            <a href="/">
                <img src="{{ asset('images/logos/logoHeaderLateral.svg') }}" alt="logo" class="logo" />
            </a>
            <a href="{{ route('noticias.index') }}" class="nav-link">Noticias</a>
            <a href="{{ route('reviews.index') }}" class="nav-link">Reviews</a>
            <a href="{{ route('juegos.index') }}" class="nav-link">Lista de juegos</a>
        </div>
        <div class="right-section">
            <div class="search-container">
                <input type="text" autocomplete="off" class="search-input" placeholder="Buscar..." id="search-input">
                <div id="search-results" class="search-results"></div>
            </div>
            <img src="{{ asset('images/logos/user.svg') }}" alt="profile" class="profile" />
        </div>
    </nav>
    <div class="min-h-screen bg-zinc-300 flex justify-center items-center">
        <div class="bg-zinc-800 p-6 rounded-lg max-w-4xl w-full">
            <h2 class="text-green-500 text-2xl">Reviews</h2>
            <hr class="border-green-500 ">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                @foreach($reviews as $review)
                    <div class="bg-zinc-900 p-4 rounded-lg">
                        <img src="{{ asset('storage/' . $review->image) }}" alt="news image" class="w-24 h-24 object-cover rounded-md">
                        <h3 class="text-green-500">{{ $review->juego->titulo }}</h3>
                        <p class="text-white">{{$review->juego->plataforma}}</p>
                        @if (strlen($review->descripcion) > 100)
                            <span class="text-white">{{ substr($review->descripcion, 0, 100) }}</span>
                            <button class="mostrar-mas text-green-500">Mostrar más</button>
                            <span class=" text-white hidden">{{ substr($review->descripcion, 100) }}</span>
                        @else
                            {{ $review->descripcion }}
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-zinc-800 text-white flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logos/logoYNombre.svg') }}" alt="logo" class="h-8 w-8" />
        </div>
        <div class="text-center">
            <span>2024 - Miguel Rodríguez Marín - CoCritic</span>
        </div>
        <div class="flex space-x-4 ">
            <a href="#" class="text-green-500">
                <img src="{{ asset('images/logos/instagram.svg') }}" alt="Instagram"  class="h-4 w-4"/>
            </a>
            <a href="#" class="text-green-500">
                <img src="{{ asset('images/logos/twitter.svg') }}" alt="Twitter" class="h-4 w-4" />
            </a>
            <a href="#" class="text-green-500">
                <img src="{{ asset('images/logos/facebook.svg') }}" alt="Facebook"  class="h-4 w-4 pr-1"/>
            </a>
        </div>
    </div>
    </body>
</html>
