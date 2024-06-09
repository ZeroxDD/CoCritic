@foreach($juegos as $juego)
    <div class="flex news-item mb-4 pr-4">
        @if (str_contains($juego->imagen, 'http'))
            <img src="{{ $juego->imagen }}" alt="news image" class="w-24 h-24 object-cover rounded-md">
        @else
            <img src="{{ asset('storage/' . $juego->imagen) }}" alt="news image" class="w-24 h-24 object-cover rounded-md">
        @endif
        <div class="ml-4">
            <h3 class="text-green-500">{{ $juego->titulo }}</h3>
            <div class="bg-green-900 text-green-600 px-2 py-0.5 rounded w-fit text-sm">{{ $juego->plataforma }}</div>
            <div>
                <p class="mt-2 text-neutral-200 text-sm overflow-x-clip">
                    @if (strlen($juego->descripcion) > 100)
                        <span>{{ substr($juego->descripcion, 0, 100) }}</span>
                        <button class="mostrar-mas text-green-500">Mostrar más</button>
                        <span class="hidden">{{ substr($juego->descripcion, 100) }}</span>
                    @else
                        {{ $juego->descripcion }}
                    @endif
                </p>
            </div>
        </div>
    </div>
@endforeach
