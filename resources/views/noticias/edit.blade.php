<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Editar Noticia</h1>
        <form action="{{ route('noticias.update', $noticia->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $noticia->titulo) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                    placeholder="Título de la noticia" required>
                @error('titulo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="contenido" class="block text-sm font-medium text-gray-700">Contenido</label>
                <textarea name="contenido" id="contenido" rows="5"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                    placeholder="Contenido de la noticia"
                    required>{{ old('contenido', $noticia->contenido) }}</textarea>
                @error('contenido')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if($noticia->imagen)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Imagen Actual</label>
                    <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}"
                        class="w-48 h-32 object-cover mt-2">
                </div>
            @endif

            <div class="mb-4">
                <label for="imagen" class="block text-sm font-medium text-gray-700">Nueva Imagen (opcional)</label>
                <input type="file" name="imagen" id="imagen"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                @error('imagen')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('noticias.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-gray-600">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-orange-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-orange-700">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</x-app-layout>