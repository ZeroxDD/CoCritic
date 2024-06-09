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
<button id="scroll-to-top" class="fixed bottom-4 right-4 md:bottom-12 md:right-12 bg-green-500 text-white p-2 rounded-full shadow-md mr-10" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
    </svg>
</button>
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
<div class="bg-zinc-900 text-white min-h-screen flex justify-center py-10 px-4">
    <div class="bg-black w-full max-w-4xl p-6 rounded-lg flex px-4">
        <div class="w-full">
            <h1 class="text-green-500 text-2xl mb-2">Juegos</h1>
            <hr class="border-green-500">
            <div class="space-y-6 mt-2">
                <div id="items-container">
                    @include('juegos.partials.items', ['juegos' => $juegos])
                </div>
                <div id="loading" style="display: none;">Cargando más juegos...</div>
            </div>
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
            <img src="{{ asset('images/logos/instagram.svg') }}" alt="Instagram" class="h-4 w-4"/>
        </a>

        <a href="#" class="text-green-500">
            <img src="{{ asset('images/logos/twitter.svg') }}" alt="Twitter" class="h-4 w-4"/>
        </a>

        <a href="#" class="text-green-500">
            <img src="{{ asset('images/logos/facebook.svg') }}" alt="Facebook" class="h-4 w-4 pr-1"/>
        </a>
    </div>
</div>

</body>
</html>
