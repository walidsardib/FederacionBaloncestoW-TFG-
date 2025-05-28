<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Crear Partido</h1>

        <form action="{{ route('partidos.store') }}" method="POST" class="bg-white shadow rounded p-4">
            @csrf
            <input type="hidden" name="idJornada" value="{{ $jornada->id }}">

            <div class="mb-4">
                <label for="idLocal" class="block text-gray-700 font-bold mb-2">Equipo Local</label>
                <select name="idLocal" id="idLocal" class="form-input mt-1 block w-full">
                    <option value="">-- Selecciona un equipo --</option>
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="idVisitante" class="block text-gray-700 font-bold mb-2">Equipo Visitante</label>
                <select name="idVisitante" id="idVisitante" class="form-input mt-1 block w-full">
                    <option value="">-- Selecciona un equipo --</option>
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="fecha" class="block text-gray-700 font-bold mb-2">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-input mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="hora" class="block text-gray-700 font-bold mb-2">Hora</label>
                <input type="time" name="hora" id="hora" class="form-input mt-1 block w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar Partido
            </button>
        </form>
    </div>
</x-app-layout>