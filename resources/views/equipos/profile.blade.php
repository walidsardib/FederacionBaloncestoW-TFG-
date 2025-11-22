<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="rounded-lg mt-1 flex flex-col items-center justify-center">
            @if ($equipo->escudo)
                <img src="{{ asset('storage/' . $equipo->escudo) }}" alt="Escudo del equipo"
                    class="w-28 h-28 rounded-full shadow-md mb-1">
            @else
                <div class="w-28 h-28 rounded-full shadow-md bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-sm">Sin Escudo</span>
                </div>
            @endif
            <h1 class="text-xl font-bold text-orange-600 mt-1">{{ $equipo->nombre }}</h1>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
            <h2 class="text-2xl font-bold mb-4 text-center">Estadísticas Generales</h2>
            <div class="flex justify-between items-center border-orange-600 pt-4">
                <div class="text-center">
                    <h3 class="text-3xl font-bold">{{ $equipo->pJugados }}</h3>
                    <p class="text-sm text-gray-600">PARTIDOS</p>
                </div>
                <div class="w-px h-12 bg-orange-600"></div>
                <div class="text-center">
                    <h3 class="text-3xl font-bold">{{ $equipo->pGanados }}</h3>
                    <p class="text-sm text-gray-600">GANADOS</p>
                </div>
                <div class="w-px h-12 bg-orange-600"></div>
                <div class="text-center">
                    <h3 class="text-3xl font-bold">{{ $equipo->pPerdidos }}</h3>
                    <p class="text-sm text-gray-600">PERDIDOS</p>
                </div>
                <div class="w-px h-12 bg-orange-600"></div>
                <div class="text-center">
                    <h3 class="text-3xl font-bold">{{ $equipo->puntosFinalizados }}</h3>
                    <p class="text-sm text-gray-600">PF</p>
                </div>
                <div class="w-px h-12 bg-orange-600"></div>
                <div class="text-center">
                    <h3 class="text-3xl font-bold">
                        {{ $equipo->pJugados > 0 ? round($equipo->puntosFinalizados / $equipo->pJugados, 2) : 0 }}
                    </h3>
                    <p class="text-sm text-gray-600">PF/P</p>
                </div>
                <div class="w-px h-12 bg-orange-600"></div>
                <div class="text-center">
                    <h3 class="text-3xl font-bold">{{ $equipo->puntosContra }}</h3>
                    <p class="text-sm text-gray-600">PC</p>
                </div>
                <div class="w-px h-12 bg-orange-600"></div>
                <div class="text-center">
                    <h3 class="text-3xl font-bold">
                        {{ $equipo->pJugados > 0 ? round($equipo->puntosContra / $equipo->pJugados, 2) : 0 }}
                    </h3>
                    <p class="text-sm text-gray-600">PC/P</p>
                </div>
            </div>
        </div>

    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
        <h2 class="text-2xl font-bold mb-4 text-center">Gráficos de Estadísticas</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <canvas id="graficoTL" width="300" height="300"></canvas>
                <p class="text-center mt-2 font-bold">Tiros Libres</p>
            </div>
            <div>
                <canvas id="graficoT2" width="300" height="300"></canvas>
                <p class="text-center mt-2 font-bold">Tiros de 2 Puntos</p>
            </div>
            <div>
                <canvas id="graficoT3" width="300" height="300"></canvas>
                <p class="text-center mt-2 font-bold">Tiros de 3 Puntos</p>
            </div>
        </div>
    </div>

    </div>


    <div class="grid grid-cols-1 gap-6 mt-6">
        <h4 class="text-2xl font-bold text-center mt-4">Ultimo Partido</h4>
        @if($ultimoPartido)
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="flex flex-col items-center text-center w-1/3">
                        <img src="{{ asset('storage/' . $ultimoPartido->equipoLocal->escudo) }}" alt="Escudo Local"
                            class="w-16 h-16 object-cover rounded-full">
                        <h5 class="mt-2 text-lg font-bold text-gray-700">{{ $ultimoPartido->equipoLocal->nombre }}</h5>
                    </div>
                    <div class="text-4xl font-bold tracking-wider text-gray-900">
                        {{ $ultimoPartido->ptsLocal }}
                    </div>
                    <div class="flex flex-col items-center text-center w-1/3">
                        <p class="text-gray-600"><strong>Pabellón:</strong> {{ $ultimoPartido->equipoLocal->pabellon }}
                        </p>
                        <p class="text-gray-600"><strong>Fecha:</strong>
                            {{ \Carbon\Carbon::parse($ultimoPartido->fecha)->format('d/m/Y') }}</p>
                        <p class="text-gray-600"><strong>Hora:</strong> {{ $ultimoPartido->hora }}</p>
                      @auth          
                        @if (auth()->user()->admin === 1)
                            @if (!$ultimoPartido->finalizado)
                                <a href="{{ route('partidos.show', $ultimoPartido->id) }}" class="text-blue-500 hover:underline">
                                    Ir al partido
                                </a>
                            @endif

                            <form action="{{ route('partidos.destroy', $ultimoPartido->id) }}" method="POST"
                                class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este partido?')">
                                    Borrar Partido
                                </button>
                            </form>
                        @endif
                      @endauth      
                        <a href="{{ route('partidos.estadisticas', $ultimoPartido->id) }}"
                            class="text-blue-500 hover:underline">
                            Información del Partido
                        </a>
                    </div>
                    <div class="text-4xl font-bold tracking-wider text-gray-900">
                        {{ $ultimoPartido->ptsVisitante }}
                    </div>
                    <div class="flex flex-col items-center text-center w-1/3">
                        <img src="{{ asset('storage/' . $ultimoPartido->equipoVisitante->escudo) }}" alt="Escudo Visitante"
                            class="w-16 h-16 object-cover rounded-full">
                        <h5 class="mt-2 text-lg font-bold text-gray-700">{{ $ultimoPartido->equipoVisitante->nombre }}
                        </h5>
                    </div>
        @endif
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 mt-6">
        <h4 class="text-2xl font-bold text-center mt-4">Proximo Partido</h4>
        @if($siguientePartido)
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="flex flex-col items-center text-center w-1/3">
                        <img src="{{ asset('storage/' . $siguientePartido->equipoLocal->escudo) }}" alt="Escudo Local"
                            class="w-16 h-16 object-cover rounded-full">
                        <h5 class="mt-2 text-lg font-bold text-gray-700">{{ $siguientePartido->equipoLocal->nombre }}</h5>
                    </div>
                    <div class="text-4xl font-bold tracking-wider text-gray-900">
                        {{ $siguientePartido->ptsLocal }}
                    </div>



                    <div class="flex flex-col items-center text-center w-1/3">
                        <p class="text-gray-600"><strong>Pabellón:</strong> {{ $siguientePartido->equipoLocal->pabellon }}
                        </p>
                        <p class="text-gray-600"><strong>Fecha:</strong>
                            {{ \Carbon\Carbon::parse($siguientePartido->fecha)->format('d/m/Y') }}</p>
                        <p class="text-gray-600"><strong>Hora:</strong> {{ $siguientePartido->hora }}</p>
                    @auth                              
                        @if (auth()->user()->admin === 1)
                            @if (!$siguientePartido->finalizado)
                                <a href="{{ route('partidos.show', $siguientePartido->id) }}" class="text-blue-500 hover:underline">
                                    Ir al partido
                                </a>
                            @endif

                            <form action="{{ route('partidos.destroy', $siguientePartido->id) }}" method="POST"
                                class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este partido?')">
                                    Borrar Partido
                                </button>
                            </form>
                        @endif
                    @endauth    
                    </div>
                    <div class="text-4xl font-bold tracking-wider text-gray-900">
                        {{ $siguientePartido->ptsVisitante }}
                    </div>
                    <div class="flex flex-col items-center text-center w-1/3">
                        <img src="{{ asset('storage/' . $siguientePartido->equipoVisitante->escudo) }}"
                            alt="Escudo Visitante" class="w-16 h-16 object-cover rounded-full">
                        <h5 class="mt-2 text-lg font-bold text-gray-700">{{ $siguientePartido->equipoVisitante->nombre }}
                        </h5>
                    </div>
        @endif
            </div>
        </div>
    </div>
    <br>
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
            @foreach ($equiposLiga as $equipo)
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
    <br>

    <div class="bg-white shadow rounded p-4">
        <div class="mb-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Jugadores</h1>
        </div>

        <div class="overflow-x-auto">
            <table id="jugadoresTable" class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-orange-600 text-white">
                        <th class="border px-4 py-2">Foto</th>
                        <th class="border px-4 py-2">Nombre</th>
                        <th class="border px-4 py-2">PJ</th>
                        <th class="border px-4 py-2">MIN</th>
                        <th class="border px-4 py-2">MIN/P</th>
                        <th class="border px-4 py-2">PTS</th>
                        <th class="border px-4 py-2">PTS/P</th>
                        <th class="border px-4 py-2">TL</th>
                        <th class="border px-4 py-2">T2</th>
                        <th class="border px-4 py-2">T3</th>
                        <th class="border px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jugadores as $jugador)
                        <tr class="hover:bg-orange-100">
                            <td class="border px-4 py-2 text-center">
                                @if ($jugador->foto)
                                    <img src="{{ asset('storage/' . $jugador->foto) }}" alt="Foto de {{ $jugador->nombre }}"
                                        class="w-12 h-12 rounded-full">
                                @else
                                    <span class="text-gray-500">Sin foto</span>
                                @endif
                            </td>

                            <td class="border px-4 py-2 font-bold text-gray-800">{{ $jugador->nombre }}</td>

                            <td class="border px-4 py-2 text-center">{{ $jugador->pJugados ?? 0 }}</td>
                            <td class="border px-4 py-2 text-center">{{ $jugador->mins ?? 0 }}</td>
                            <td class="border px-4 py-2 text-center">{{ $jugador->minsPP ?? 0 }}</td>
                            <td class="border px-4 py-2 text-center">{{ $jugador->pts ?? 0 }}</td>
                            <td class="border px-4 py-2 text-center">{{ $jugador->ptsPP ?? 0 }}</td>
                            <td class="border px-4 py-2 text-center">
                                <canvas id="graficoTL-{{ $jugador->id }}" width="50" height="50"></canvas>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <canvas id="graficoT2-{{ $jugador->id }}" width="50" height="50"></canvas>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <canvas id="graficoT3-{{ $jugador->id }}" width="50" height="50"></canvas>
                            </td>

                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('jugadores.index', $jugador->id) }}"
                                    class="text-orange-600 hover:text-orange-800">
                                    <i class="fa-solid fa-eye"></i> </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="border px-4 py-2 text-center">No hay jugadores en este equipo.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        $('#jugadoresTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            },
            responsive: true,
            autoWidth: false,
            pageLength: 10,
        });

        const options = {
            responsive: true,
            maintainAspectRatio: true,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    enabled: false,
                },
            },
        };

        const addCenterText = (chart, text) => {
            const ctx = chart.ctx;
            const width = chart.width;
            const height = chart.height;

            ctx.save();
            ctx.font = 'bold 16px Arial';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';

            const lines = text.split('\n');
            const lineHeight = 20;

            lines.forEach((line, index) => {
                ctx.fillText(line, width / 2, height / 2 + index * lineHeight);
            });

            ctx.restore();
        };

        const equipoDataTL = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [
                    {{ $intentosTL - $aciertosTL }},
                    {{ $aciertosTL }}
                ],
                backgroundColor: ['#F44336', '#4CAF50'],
                borderWidth: 2,
            }]
        };

        const equipoDataT2 = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [
                    {{ $intentos2P - $aciertos2P }},
                    {{ $aciertos2P }}
                ],
                backgroundColor: ['#F44336', '#4CAF50'],
                borderWidth: 2,
            }]
        };

        const equipoDataT3 = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [
                    {{ $intentos3P - $aciertos3P }},
                    {{ $aciertos3P }}
                ],
                backgroundColor: ['#F44336', '#4CAF50'],
                borderWidth: 2,
            }]
        };

        new Chart(document.getElementById('graficoTL'), {
            type: 'doughnut',
            data: equipoDataTL,
            options: options,
            plugins: [{
                id: 'centerText',
                afterDraw: (chart) => {
                    const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                    const encestados = chart.data.datasets[0].data[1];
                    const porcentaje = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                    addCenterText(chart, `${porcentaje}%\n${encestados}/${total}`);
                },
            }],
        });

        new Chart(document.getElementById('graficoT2'), {
            type: 'doughnut',
            data: equipoDataT2,
            options: options,
            plugins: [{
                id: 'centerText',
                afterDraw: (chart) => {
                    const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                    const encestados = chart.data.datasets[0].data[1];
                    const percentage = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                    addCenterText(chart, `${percentage}%\n${encestados}/${total}`);
                },
            }],
        });

        new Chart(document.getElementById('graficoT3'), {
            type: 'doughnut',
            data: equipoDataT3,
            options: options,
            plugins: [{
                id: 'centerText',
                afterDraw: (chart) => {
                    const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                    const encestados = chart.data.datasets[0].data[1];
                    const percentage = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                    addCenterText(chart, `${percentage}%\n${encestados}/${total}`);
                },
            }],
        });

        // graficos individuales para cada jugador
        @foreach ($jugadores as $jugador)
            (() => {
                const jugadorDataTL = {
                    labels: ['Fallados', 'Encestados'],
                    datasets: [{
                        data: [
                            {{ $jugador->intentosTL - $jugador->aciertosTL }},
                            {{ $jugador->aciertosTL }}
                        ],
                        backgroundColor: ['#F44336', '#4CAF50'],
                        borderWidth: 1,
                    }]
                };

                const jugadorDataT2 = {
                    labels: ['Fallados', 'Encestados'],
                    datasets: [{
                        data: [
                            {{ $jugador->intentos2P - $jugador->aciertos2P }},
                            {{ $jugador->aciertos2P }}
                        ],
                        backgroundColor: ['#F44336', '#4CAF50'],
                        borderWidth: 1,
                    }]
                };

                const jugadorDataT3 = {
                    labels: ['Fallados', 'Encestados'],
                    datasets: [{
                        data: [
                            {{ $jugador->intentos3P - $jugador->aciertos3P }},
                            {{ $jugador->aciertos3P }}
                        ],
                        backgroundColor: ['#F44336', '#4CAF50'],
                        borderWidth: 1,
                    }]
                };

                new Chart(document.getElementById('graficoTL-{{ $jugador->id }}'), {
                    type: 'doughnut',
                    data: jugadorDataTL,
                    options: options,
                    plugins: [{
                        id: 'centerText',
                        afterDraw: (chart) => {
                            const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            const encestados = chart.data.datasets[0].data[1];
                            const percentage = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                            addCenterText(chart, `${percentage}%\n${encestados}/${total}`);
                        },
                    }],
                });

                new Chart(document.getElementById('graficoT2-{{ $jugador->id }}'), {
                    type: 'doughnut',
                    data: jugadorDataT2,
                    options: options, plugins: [{
                        id: 'centerText',
                        afterDraw: (chart) => {
                            const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            const encestados = chart.data.datasets[0].data[1];
                            const percentage = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                            addCenterText(chart, `${percentage}%\n${encestados}/${total}`);
                        },
                    }],
                });

                new Chart(document.getElementById('graficoT3-{{ $jugador->id }}'), {
                    type: 'doughnut',
                    data: jugadorDataT3,
                    options: options, plugins: [{
                        id: 'centerText',
                        afterDraw: (chart) => {
                            const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            const encestados = chart.data.datasets[0].data[1];
                            const percentage = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                            addCenterText(chart, `${percentage}%\n${encestados}/${total}`);
                        },
                    }],
                });
            })();
        @endforeach
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<style>
    canvas {
        max-width: 100px;
        max-height: 100px;
        margin: 0 auto;
    }

    .grid {
        max-width: 900px;
        margin: 0 auto;
    }

    td {
        vertical-align: middle;
    }

    td canvas {
        width: 80px !important;
        height: 80px !important;
    }

    td {
        min-height: 100px;
    }
</style>