<x-app-layout>
    <div class="container mx-auto py-8">
        @auth
        @if(auth()->user()->admin == 1)
            <div class="mb-4 flex justify-end space-x-4">
                <a href="{{ route('noticias.edit', $noticia->id) }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                    Editar Noticia
                </a>

                <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition duration-200"
                        onclick="return confirm('¿Estás seguro de eliminar esta noticia?')">
                        Borrar Noticia
                    </button>
                </form>
            </div>

        @endif
        @endauth    
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row">
            @if($noticia->imagen)
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}"
                        class="w-full h-full object-cover">
                </div>
            @endif

            <div class="p-6 md:w-1/2 flex flex-col justify-center">
                <h1 class="text-4xl font-bold text-orange-600 mb-4">{{ $noticia->titulo }}</h1>
                <p class="text-gray-700 text-base mb-6 leading-relaxed">{{ $noticia->contenido }}</p>

                <div class="text-gray-500 text-sm">
                    <p>Publicado el: {{ $noticia->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('noticias.index') }}"
                class="bg-orange-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-orange-700">
                Volver a Noticias
            </a>
        </div>
    </div>
</x-app-layout>