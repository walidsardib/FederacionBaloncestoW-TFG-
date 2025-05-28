<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Editar Jugador</h1>
        <form action="{{ route('jugadores.update', $jugador->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow rounded p-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ $jugador->nombre }}"
                    class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="foto" class="block text-gray-700">Foto</label>
                <input type="file" name="foto" id="foto" class="form-input mt-1 block w-full">
                @if ($jugador->foto)
                    <img src="{{ asset('storage/' . $jugador->foto) }}" alt="Foto de {{ $jugador->nombre }}"
                        class="w-24 h-24 mt-2">
                @endif
            </div>
            <div class="mb-4">
                <label for="dorsal" class="block text-gray-700">Dorsal</label>
                <input type="number" name="dorsal" id="dorsal" value="{{ $jugador->dorsal }}"
                    class="form-input mt-1 block w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
        </form>
    </div>
</x-app-layout>