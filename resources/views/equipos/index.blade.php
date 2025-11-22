<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Inicio</h1>
        @auth
        @if ($equipo)
            <div class="bg-white shadow rounded p-4 flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-bold mb-2">Tu Equipo</h2>
                    <p><strong>Nombre:</strong> {{ $equipo->nombre }}</p>
                    <p><strong>Entrenador:</strong> {{ $equipo->entrenador }}</p>
                    <p><strong>Ciudad:</strong> {{ $equipo->ciudad }}</p>
                    <div class="mt-4">
                        <a href="{{ route('equipos.show', $equipo->id) }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded">Ver Equipo</a>
                        <a href="{{ route('equipos.edit', $equipo->id) }}"
                            class="bg-yellow-500 text-white px-4 py-2 rounded">Editar Equipo</a>
                    </div>
                </div>

                @if ($equipo->escudo)
                    <div>
                        <img src="{{ asset('storage/' . $equipo->escudo) }}" alt="Escudo del equipo"
                            class="w-30 h-24 rounded-full">
                    </div>
                @endif
            </div>
        @else
            <div class="bg-white shadow rounded p-4 text-center">
                <p class="text-gray-700 mb-4">No tienes un equipo asociado.</p>
                <a href="{{ route('equipos.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Crear Equipo</a>
            </div>
        @endif

        @if (!empty($liga) && count($liga) > 0)
        <div class="clasificacion my-10">
            <h1 class="text-2xl font-bold">Clasificación</h1>
            <table class="table-auto w-full border-collapse border border-gray-300 rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-orange-500 text-white">
                    <tr>
                        <th class="border px-4 py-2 text-left">Posición</th>
                        <th class="border px-4 py-2 text-left">Nombre</th>
                        <th class="border px-4 py-2 text-left">Partidos Jugados</th>
                        <th class="border px-4 py-2 text-left">Partidos Ganados</th>
                        <th class="border px-4 py-2 text-left">Partidos Perdidos</th>
                        <th class="border px-4 py-2 text-left">Puntos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($liga as $equipo)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 transition-colors">
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('equipos.profile', $equipo->id) }}" class="text-orange-600 hover:underline">
                                    <strong>{{ $equipo->nombre }}</strong>
                                </a>
                            </td>
                            <td class="border px-4 py-2">{{ $equipo->pJugados }}</td>
                            <td class="border px-4 py-2">{{ $equipo->pGanados }}</td>
                            <td class="border px-4 py-2">{{ $equipo->pPerdidos }}</td>
                            <td class="border px-4 py-2 font-bold text-center">{{ $equipo->pts }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">Tu equipo no está en ninguna liga o no tienes un equipo</p>
        @endif
    </div>
    @endauth
    @guest
    <div class="">
        Inicia sesion para poder añadir tus secciones/jugadores/equipos favoritas a la pagina de inicio        
    </div>
    @endguest
</x-app-layout>