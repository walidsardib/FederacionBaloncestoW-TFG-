<x-app-layout>
    <div class="container mx-auto py-8">
        @if(auth()->user()->admin == 1)
            <div class="mb-4 text-end">
                <a href="{{ route('noticias.create') }}"
                    class="bg-orange-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-orange-700">
                    Añadir Noticia
                </a>
            </div>
        @endif

        <h1 class="text-3xl font-bold text-center mb-6">Noticias</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($noticias as $noticia)
                <div class="bg-white shadow-md rounded-lg overflow-hidden cursor-pointer hover:shadow-lg transition-shadow duration-300"
                    onclick="location.href='{{ route('noticias.show', $noticia->id) }}'">

                    <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}"
                        class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h5 class="text-lg font-bold text-orange-600 mb-2">{{ $noticia->titulo }}</h5>
                        <p class="text-gray-700 text-sm mb-4">{{ Str::limit($noticia->contenido, 100) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>