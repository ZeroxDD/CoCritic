<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CoCritic tablas') }}
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        </h2>
    </x-slot>
    <div class="bg-zinc-900 text-white min-h-screen py-10 px-4">
        <h1 class="text-2xl font-bold mb-4">Datos de la página</h1>

        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-2">Noticias</h2>
            <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th class="w-1/12 px-4 py-2 text-left">Seleccionar</th>
                    <th class="w-3/12 px-4 py-2 text-left">Título</th>
                    <th class="w-6/12 px-4 py-2 text-left">Contenido</th>
                    <th class="w-2/12 px-4 py-2 text-left">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tbody>
                @foreach($noticias as $noticia)
                    <tr class="bg-white dark:bg-gray-800">
                        <td class="border px-4 py-2"><input type="checkbox" name="seleccion[]" value="{{ $noticia->id }}"></td>
                        <td class="border px-4 py-2"><span>{{$noticia->titulo}}</span></td>
                        <td class="border px-4 py-2"><span>{{$noticia->descripcion}}</span></td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('¿Estás seguro de que deseas eliminar esta noticia?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

        <div class="bg-zinc-900 text-white mb-8">
            <h2 class="text-xl font-semibold mb-2">Reviews</h2>
            <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th class="w-1/12 px-4 py-2 text-left">Seleccionar</th>
                    <th class="w-3/12 px-4 py-2 text-left">Título</th>
                    <th class="w-6/12 px-4 py-2 text-left">Contenido</th>
                    <th class="w-2/12 px-4 py-2 text-left">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                    <tr class="bg-white dark:bg-gray-800">
                        <td class="border px-4 py-2"><input type="checkbox" name="seleccion[]" value="{{ $review->id }}"></td>
                        <td class="border px-4 py-2"><span>{{$review->juego->titulo}}</span></td>
                        <td class="border px-4 py-2"><span>{{$review->descripcion}}</span></td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('¿Estás seguro de que deseas eliminar esta review?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-2">Juegos</h2>
            <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th class="w-1/12 px-4 py-2 text-left">Seleccionar</th>
                    <th class="w-3/12 px-4 py-2 text-left">Nombre</th>
                    <th class="w-6/12 px-4 py-2 text-left">Descripción</th>
                    <th class="w-2/12 px-4 py-2 text-left">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($juegos as $juego)
                    <tr class="bg-white dark:bg-gray-800">
                        <td class="border px-4 py-2"><input type="checkbox" name="seleccion[]" value="{{ $juego->id }}"></td>
                        <td class="border px-4 py-2">{{ $juego->titulo }}</td>
                        <td class="border px-4 py-2">{{ $juego->descripcion }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('juegos.destroy', $juego->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('¿Estás seguro de que deseas eliminar esta juego?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
