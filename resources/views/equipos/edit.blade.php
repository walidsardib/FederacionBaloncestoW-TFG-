<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Editar Equipo</h1>
        <form method="POST" action="{{ route('equipos.update', $equipo->id) }}" enctype="multipart/form-data"
            class="bg-white shadow rounded p-6">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-medium">Nombre del Equipo</label>
                <input type="text" name="nombre" id="nombre" value="{{ $equipo->nombre }}"
                    class="w-full border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="entrenador" class="block text-gray-700 font-medium">Entrenador</label>
                <input type="text" name="entrenador" id="entrenador" value="{{ $equipo->entrenador }}"
                    class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="pabellon" class="block text-gray-700 font-medium">Pabellón</label>
                <input type="text" name="pabellon" id="pabellon" value="{{ $equipo->pabellon }}"
                    class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="ciudad" class="block text-gray-700 font-medium">Ciudad</label>
                <input type="text" name="ciudad" id="ciudad" value="{{ $equipo->ciudad }}"
                    class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="escudo" class="block text-gray-700 font-medium">Escudo del Equipo</label>
                <input type="file" name="escudo" id="escudo" class="w-full border-gray-300 rounded mt-1">
                @if ($equipo->escudo)
                    <img src="{{ asset('storage/' . $equipo->escudo) }}" alt="Escudo del equipo" class="w-30 h-24 mt-4">
                @endif
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar
                    Equipo</button>
            </div>
        </form>
    </div>
</x-app-layout>