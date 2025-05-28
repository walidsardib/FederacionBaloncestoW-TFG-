<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="flex items-center mb-6">
            <img src="{{ asset('storage/' . $equipo->escudo) }}" alt="Escudo del equipo"
                class="w-30 h-24 rounded-full mr-4">
            <div>
                <h1 class="text-2xl font-bold">{{ $equipo->nombre }}</h1>
                <p class="text-gray-600">Entrenador: <strong>{{ $equipo->entrenador }}</strong></p>
                <p class="text-gray-600">Pabellón: <strong>{{ $equipo->pabellon }}</strong></p>
                <p class="text-gray-600">Ciudad: <strong>{{ $equipo->ciudad }}</strong></p>
            </div>
        </div>

        <div class="mt-6 bg-white shadow rounded p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold">Jugadores del Equipo</h2>
                <a href="{{ route('jugadores.create', ['equipo_id' => $equipo->id]) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Añadir Jugador
                </a>
            </div>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Foto</th>
                        <th class="border px-4 py-2">Nombre</th>
                        <th class="border px-4 py-2">Dorsal</th>
                        <th class="border px-4 py-2">Puntos</th>
                        <th class="border px-4 py-2">Rebotes</th>
                        <th class="border px-4 py-2">Asistencias</th>
                        <th class="border px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($equipo->jugadores as $jugador)
                        <tr>
                            <td class="border px-4 py-2">
                                @if ($jugador->foto)
                                    <img src="{{ asset('storage/' . $jugador->foto) }}" alt="Foto de {{ $jugador->nombre }}"
                                        class="w-12 h-12 rounded-full">
                                @else
                                    <span class="text-gray-500">Sin foto</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">{{ $jugador->nombre }}</td>
                            <td class="border px-4 py-2">{{ $jugador->dorsal }}</td>
                            <td class="border px-4 py-2">{{ $jugador->pts ?? 0 }}</td>
                            <td class="border px-4 py-2">{{ $jugador->rebotes ?? 0 }}</td>
                            <td class="border px-4 py-2">{{ $jugador->asistencias ?? 0 }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('jugadores.edit', $jugador->id) }}"
                                    class="text-yellow-500 hover:underline mr-2">Editar</a>
                                <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="border px-4 py-2 text-center">No hay jugadores en este equipo.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>