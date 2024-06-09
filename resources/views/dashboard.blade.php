<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CoCritic inserción de datos') }}
        </h2>
    </x-slot>

    <div class="py-5 bg-gray-500" >
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

    <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-green-400">
            {{ __("Añadir nuevo juego") }}
            <hr class="border-green-500 mb-2">

            <form method="post" action="{{ route('juegos.store') }}" enctype="multipart/form-data">
                @csrf
                <label for="titulo">Título del juego:</label>
                <input type="text" name="titulo" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">

                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"></textarea>

                <label for="fecha_de_salida">Fecha de Salida</label>
                <input type="date" name="fecha_de_salida" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">

                <label for="plataforma">Plataforma</label>
                <input type="text" name="plataforma" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">

                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" data-preview-id="image-preview1" onchange="previewImage(event)" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                <img id="image-preview1" src="#" alt="Previsualización de la imagen" style="display: none; max-width: 100%; max-height: 200px;">

                <button type="submit" class="flex items-center justify-end mt-4 pl-10 inline-flex items-center px-8 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ">Registrar juego</button>
            </form>
        </div>
    </div>
</div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div  class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-green-400">
                    {{ __("Añadir juegos desde la API") }}
                    <hr class="border-green-500 mb-2">

                    <form method="post" action="{{ route('juegos.create') }}" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="flex items-center justify-end mt-4 pl-10 inline-flex items-center px-8 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ">Añadir juegos desde la API</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-green-400">
                    {{ __("Noticias") }}
                    <hr class="border-green-500 mb-2">

                    <form method="post" action="{{route('noticias.store') }}" enctype="multipart/form-data">
                        @csrf

                        <label for="titulo">Título de la noticia:</label>
                        <input type="text" name="titulo" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"></input>

                        <label for="descripcion">Descripción noticia:</label>
                        <textarea name="descripcion" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"></textarea>

                        <label for="image">Imagen</label>
                        <input type="file" name="image" data-preview-id="image-preview2" onchange="previewImage(event)" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <img id="image-preview2" src="#" alt="Previsualización de la imagen" style="display: none; max-width: 100%; max-height: 200px;">

                        <button type="submit" class="flex items-center justify-end mt-4 pl-10 inline-flex items-center px-8 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Enviar Noticia</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-black  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-green-400">
                    {{ __("Nueva review") }}
                    <hr class="border-green-500 mb-2">

                    <form method="post" action="{{ route('reviews.store') }}" enctype="multipart/form-data">
                        @csrf

                        <label for="name">Nombre del juego:</label>
                        <select name="juego_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                            @foreach ($juegos as $juego)
                                <option value="{{ $juego['id'] }}">{{ $juego['titulo'] }}</option>
                            @endforeach
                        </select>

                        <label for="descripcion" > Descripción</label>
                        <textarea name="descripcion" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"></textarea>

                        <label for="plataforma" > Plataforma</label>
                        <textarea name="plataforma" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"></textarea>

                        <label for="name"> Puntuación</label>
                        <select name="puntuacion" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">>
                            @for($i=0; $i<11; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>

                        <label for="image">Imagen</label>
                        <input type="file" name="image" data-preview-id="image-preview3" onchange="previewImage(event)" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <img id="image-preview3" src="#" alt="Previsualización de la imagen" style="display: none; max-width: 100%; max-height: 200px;">

                        <button type="submit" class="flex items-center justify-end mt-4 pl-10 inline-flex items-center px-8 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Enviar Review</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-black  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-green-400">
                    {{ __("Nuevo trailer") }}
                    <hr class="border-green-500 mb-2">

                    <form method="post" action="{{ route('trailer.store') }}" enctype="multipart/form-data">
                        @csrf

                        <label for="name">Nombre del trailer:</label>
                        <input type="text" name="nombre" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">

                        <label for="url">URL del video de YouTube:</label>
                        <input type="text" name="url" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">


                        <button type="submit" class="flex items-center justify-end mt-4  inline-flex items-center px-8 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Añadir trailer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/previewImage.js') }}"></script>
</x-app-layout>
