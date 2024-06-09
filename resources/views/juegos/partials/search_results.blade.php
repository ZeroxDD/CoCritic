@foreach($juegos as $juego)
    <div class="result-item">
        @if (str_contains($juego->imagen, 'http'))
            <img src="{{ $juego->imagen }}" alt="news image" class="w-24 h-24 object-cover rounded-md">
        @else
            <img src="{{ asset('storage/' . $juego->imagen) }}" alt="news image" class="w-24 h-24 object-cover rounded-md">
        @endif
        <h4 class="text-green-500">{{ $juego->titulo }}</h4>
        <p class="text-sm text-neutral-500">{{ $juego->plataforma }}</p>
    </div>
@endforeach

@if ($juegos->isEmpty())
    <div class="result-item">No results found</div>
@endif
