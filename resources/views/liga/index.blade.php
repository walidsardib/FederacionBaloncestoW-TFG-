<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Competiciones</h1>
            @if (auth()->user()->admin === 1)
                <div class="rounded-lg flex space-x-4">
                    <a href="{{ route('ligas.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Añadir Liga
                    </a>
                    <a href="#" id="editarLiga" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                        Editar Liga
                    </a>
                </div>
            @endif
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('ligas.index') }}" id="formLigasJornadas">
            <div
                class="bg-white rounded-xl shadow-lg p-6 mb-8 flex flex-col md:flex-row md:space-x-8 space-y-4 md:space-y-0 items-center justify-center">
                <div class="flex flex-col w-full md:w-1/3">
                    <label for="selectTemporada" class="text-lg font-semibold text-orange-600 flex items-center mb-2">
                        <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M12 4v16m8-8H4" />
                        </svg>
                        Selecciona Temporada
                    </label>
                    <select name="temporada" id="selectTemporada"
                        class="form-select rounded-lg border-2 border-orange-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition w-full py-2 px-4 text-lg shadow-sm"
                        onchange="this.form.submit()">
                        <option value="">-- Selecciona una temporada --</option>
                        @foreach ($temporadas as $temporada)
                            <option value="{{ $temporada->id }}" {{ $temporadaSeleccionada == $temporada->id ? 'selected' : '' }}>
                                {{ $temporada->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col w-full md:w-1/2">
                    <label for="selectLigas" class="text-lg font-semibold text-orange-600 flex items-center mb-2">
                        <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path
                                d="M17 20h5v-2a4 4 0 0 0-3-3.87M9 20H4v-2a4 4 0 0 1 3-3.87M16 3.13a4 4 0 0 1 0 7.75M8 3.13a4 4 0 0 0 0 7.75" />
                        </svg>
                        Selecciona Liga
                    </label>
                    <select name="liga" id="selectLigas"
                        class="form-select rounded-lg border-2 border-orange-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition w-full py-2 px-4 text-lg shadow-sm"
                        required {{ empty($temporadaSeleccionada) ? 'disabled' : '' }}>
                        <option value="">-- Selecciona una liga --</option>
                        @foreach ($ligas as $liga)
                            <option value="{{ $liga->id }}" {{ $ligaSeleccionada == $liga->id ? 'selected' : '' }}>
                                {{ $liga->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col w-full md:w-1/2">
                    <label for="selectJornada" class="text-lg font-semibold text-orange-600 flex items-center mb-2">
                        <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path
                                d="M8 7V3M16 7V3M4 11h16M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z" />
                        </svg>
                        Selecciona Jornada
                    </label>
                    <select name="jornada" id="selectJornada"
                        class="form-select rounded-lg border-2 border-orange-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition w-full py-2 px-4 text-lg shadow-sm"
                        {{ empty($jornadas) ? 'disabled' : '' }}>
                        <option value="">-- Selecciona una jornada --</option>
                        @foreach ($jornadas as $jornada)
                            <option value="{{ $jornada->id }}" {{ $jornadaSeleccionada == $jornada->id ? 'selected' : '' }}>
                                {{ $jornada->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>


        @if($jornadaSeleccionada != null)
            <h4 class="text-2xl font-bold text-center mt-4">Partidos de la Jornada</h4>
            <div class="grid grid-cols-1 gap-6 mt-6">
                @foreach ($partidos as $partido)
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <div class="flex flex-col md:flex-row items-center justify-between">
                            <div class="flex flex-col items-center text-center w-1/3">
                                <img src="{{ asset('storage/' . $partido->equipoLocal->escudo) }}" alt="Escudo Local"
                                    class="w-16 h-16 object-cover rounded-full">
                                <h5 class="mt-2 text-lg font-bold text-gray-700">{{ $partido->equipoLocal->nombre }}</h5>
                            </div>
                            <div class="text-4xl font-bold tracking-wider text-gray-900">
                                {{ $partido->ptsLocal }}
                            </div>

                            <div class="flex flex-col items-center text-center w-1/3">
                                <p class="text-gray-600"><strong>Pabellón:</strong> {{ $partido->equipoLocal->pabellon }}</p>
                                <p class="text-gray-600"><strong>Fecha:</strong>
                                    {{ \Carbon\Carbon::parse($partido->fecha)->format('d/m/Y') }}</p>
                                <p class="text-gray-600"><strong>Hora:</strong> {{ $partido->hora }}</p>

                                @if (auth()->user()->admin === 1)
                                    @if (!$partido->finalizado)
                                        <a href="{{ route('partidos.show', $partido->id) }}" class="text-blue-500 hover:underline">
                                            Ir al partido
                                        </a>
                                    @endif

                                    <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST"
                                        class="inline-block ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este partido?')">
                                            Borrar Partido
                                        </button>
                                    </form>
                                @endif

                                @if($partido->finalizado)
                                    <a href="{{ route('partidos.estadisticas', $partido->id) }}"
                                        class="text-blue-500 hover:underline">
                                        Información del Partido
                                    </a>
                                @endif

                            </div>
                            <div class="text-4xl font-bold tracking-wider text-gray-900">
                                {{ $partido->ptsVisitante }}
                            </div>
                            <div class="flex flex-col items-center text-center w-1/3">
                                <img src="{{ asset('storage/' . $partido->equipoVisitante->escudo) }}" alt="Escudo Visitante"
                                    class="w-16 h-16 object-cover rounded-full">
                                <h5 class="mt-2 text-lg font-bold text-gray-700">{{ $partido->equipoVisitante->nombre }}</h5>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            @if(auth()->user()->admin === 1)
                <div class="mt-4 text-center">
                    <a href="{{ route('partidos.create', ['jornada' => $jornadaSeleccionada, 'liga' => request('liga')]) }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Crear Partido
                    </a>
                </div>
            @endif
        @else
            <p class="text-center mt-3 text-gray-500">No hay partidos registrados en esta jornada.</p>
        @endif


        @if (!empty($equipos) && count($equipos) > 0)
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
                    @foreach ($equipos as $equipo)
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
            <p class="text-gray-500">No hay equipos disponibles para la liga seleccionada.</p>
        @endif
    </div>
</x-app-layout>
<script>
    document.getElementById('selectTemporada').addEventListener('change', function () {
        document.getElementById('selectLigas').selectedIndex = 0;
        document.getElementById('selectJornada').selectedIndex = 0;
        document.getElementById('formLigasJornadas').submit();
    });
    document.getElementById('selectLigas').addEventListener('change', function () {
        document.getElementById('selectJornada').selectedIndex = 0;
        document.getElementById('formLigasJornadas').submit();
    });
    document.getElementById('selectJornada').addEventListener('change', function () {
        document.getElementById('formLigasJornadas').submit();
    });

    document.addEventListener('DOMContentLoaded', () => {
        const selectLigas = document.getElementById('selectLigas');
        const editarLiga = document.getElementById('editarLiga');
        if (!selectLigas.value) {
            editarLiga.style.display = 'none';
        } else {
            editarLiga.href = `/ligas/${selectLigas.value}/edit`;
            editarLiga.style.display = 'inline-block';
        }
        selectLigas.addEventListener('change', () => {
            const ligaId = selectLigas.value;
            if (ligaId) {
                editarLiga.href = `/ligas/${ligaId}/edit`;
                editarLiga.style.display = 'inline-block';
            } else {
                editarLiga.href = '#';
                editarLiga.style.display = 'none';
            }
        });
    });
</script>