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
            @if(auth()->check())
                <a href="{{ route('dashboard') }}">
                    @else
                        <a href="{{ route('login') }}">
                            @endif
                            <img src="{{ asset('images/logos/user.svg') }}" alt="profile" class="profile" />
                        </a>
        </div>
    </nav>
    <div class="bg-zinc-200 flex justify-center">
        <div class="bg-black content-container mt-2 mb-2 rounded-lg ">
            <img src="{{asset('images/yakuza.png')}}" alt="Main Image" class="main-image" />
            <p class="description">Yakuza 7: Like A Dragon - Te hace sentir un dragón.</p>
            <div class="grid-container">
                <div>
                    <h2 class="section-title">Noticias</h2>
                    @foreach($noticias as $noticia)
                        <img src="{{ asset('storage/' . $noticia->image) }}" alt="News Image 1" class="grid-image" />
                        <span>{{$noticia->titulo}}</span>
                    @endforeach
                </div>
                <div>
                    <h2 class="section-title">Reseñas</h2>
                    @foreach($reviews as $review)
                        <img src="{{ asset('storage/' . $review->image) }}" alt="News Image 1" class="grid-image" />
                        <span>{{$review->juego->titulo}}</span>
                    @endforeach
                </div>
            </div>
            <div>
                <h2 class="section-title">Trailers de la semana</h2>
                @if (!empty ($trailer[0]))
                    <div>
                        <iframe class="aspect-video w-full"  src="{{$trailer[0]->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <p class="trailer-description">{{ $trailer[0]->nombre }}</p>
                    </div>
                @else
                    <p>No hay trailer disponible</p>
                @endif
            </div>
        </div>
    </div>
    <section class="featured-section bg-zinc-900 text-white py-4">
        <div class="container mx-auto">
            <h2 class="featured-title text-center text-green-500 font-bold text-lg mb-4">Juegos Destacados</h2>
            <div class="featured-images flex justify-center items-center space-x-4">
                @foreach($juegos as $juego)
                    @if (str_contains($juego->imagen, 'http'))
                        <img src="{{ $juego->imagen }}" alt="news image" class="w-24 h-24 object-cover rounded-md">
                    @else
                        <img src="{{ asset('storage/' . $juego->imagen) }}" alt="news image" class="w-24 h-24 object-cover rounded-md">
                   @endif
                @endforeach
            </div>
        </div>
    </section>

    <div class="bg-zinc-900 text-white flex justify-between items-center">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script>

    </script>

    </body>
</html>
