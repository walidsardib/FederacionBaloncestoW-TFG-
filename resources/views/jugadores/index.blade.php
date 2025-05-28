<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="flex flex-col items-center justify-center bg-white shadow-lg rounded-lg p-6">
            @if ($jugador->foto)
                <img src="{{ asset('storage/' . $jugador->foto) }}" alt="Foto del jugador"
                    class="w-32 h-32 rounded-full shadow-md mb-4">
            @else
                <div class="w-32 h-32 rounded-full shadow-md bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-lg">Sin Foto</span>
                </div>
            @endif
            <h1 class="text-2xl font-bold text-orange-600">{{ $jugador->nombre }}</h1>
            <p class="text-sm text-gray-500">{{ $jugador->equipo->nombre ?? 'Sin equipo' }}</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
            <div class="grid grid-cols-5 gap-4 text-center">
                <div class="border-l-4 border-orange-600">
                    <h3 class="text-3xl font-bold">{{ $jugador->pJugados }}</h3>
                    <p class="text-sm text-gray-600">PARTIDOS</p>
                </div>
                <div class="border-l-4 border-orange-600">
                    <h3 class="text-3xl font-bold">{{ $jugador->mins }}</h3>
                    <p class="text-sm text-gray-600">MIN</p>
                </div>
                <div class="border-l-4 border-orange-600">
                    <h3 class="text-3xl font-bold">{{ $jugador->minsPP }}</h3>
                    <p class="text-sm text-gray-600">MIN/P</p>
                </div>
                <div class="border-l-4 border-orange-600">
                    <h3 class="text-3xl font-bold">{{ $jugador->pts }}</h3>
                    <p class="text-sm text-gray-600">PTS</p>
                </div>
                <div class="border-l-4 border-orange-600 border-r-4">
                    <h3 class="text-3xl font-bold">{{ $jugador->ptsPP }}</h3>
                    <p class="text-sm text-gray-600">PTS/P</p>
                </div>
            </div>
        </div>

        <div class="bg-orange-600 text-white text-center font-bold py-2 mt-6">
            ESTADÍSTICAS DEL JUGADOR/A
        </div>
        <div class="flex justify-center items-center space-x-8 bg-white shadow-lg rounded-lg p-6">
            <div class="text-center">
                <canvas id="graficoTL" style="width: 150px; height: 150px;"></canvas>
                <p class="text-sm mt-2">TL</p>
            </div>
            <div class="text-center">
                <canvas id="graficoT2" style="width: 150px; height: 150px;"></canvas>
                <p class="text-sm mt-2">T2</p>
            </div>
            <div class="text-center">
                <canvas id="graficoT3" style="width: 150px; height: 150px;"></canvas>
                <p class="text-sm mt-2">T3</p>
            </div>
        </div>

        <div class="overflow-x-auto mt-6">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead class="bg-orange-600 text-white">
                    <tr>
                        <th class="border px-4 py-2">Partido</th>
                        <th class="border px-4 py-2">Día de juego</th>
                        <th class="border px-4 py-2">PTS</th>
                        <th class="border px-4 py-2">MIN</th>
                        <th class="border px-4 py-2">TL</th>
                        <th class="border px-4 py-2">T2</th>
                        <th class="border px-4 py-2">T3</th>
                        <th class="border px-4 py-2"></th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($jugador->estadisticas as $estadistica)
                        <tr class="hover:bg-orange-100">
                            <td class="border px-4 py-2 text-center">
                                @if ($estadistica->partido)
                                    @if ($estadistica->partido->equipoLocal && $estadistica->partido->equipoVisitante)
                                        <a href="{{ route('equipos.profile', $estadistica->partido->equipoLocal->id) }}"
                                            class="text-orange-600 hover:text-orange-800">
                                            {{ $estadistica->partido->equipoLocal->nombre }}
                                        </a>
                                        vs
                                        <a href="{{ route('equipos.profile', $estadistica->partido->equipoVisitante->id) }}"
                                            class="text-orange-600 hover:text-orange-800">
                                            {{ $estadistica->partido->equipoVisitante->nombre }}
                                        </a>
                                    @else
                                        <span class="text-gray-500">Equipos no disponibles</span>
                                    @endif
                                @else
                                    <span class="text-gray-500">Partido no disponible</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2 text-center">{{ $estadistica->partido->fecha }}</td>
                            <td class="border px-4 py-2 text-center">{{ $estadistica->puntos }}</td>
                            <td class="border px-4 py-2 text-center">{{ $estadistica->minutosJugados }}</td>
                            <td class="border px-4 py-2 text-center">
                                <canvas id="graficoTL-{{ $estadistica->id }}" style="width: 10px; height: 10px;"></canvas>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <canvas id="graficoT2-{{ $estadistica->id }}" style="width: 10px; height: 10px;"></canvas>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <canvas id="graficoT3-{{ $estadistica->id }}" style="width: 10px; height: 10px;"></canvas>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                @if ($estadistica->partido)
                                    <a href="{{ route('partidos.estadisticas', $estadistica->partido->id) }}"
                                        class="text-orange-600 hover:text-orange-800">
                                        Ver Partido
                                    </a>
                                @else
                                    <span class="text-gray-500">No disponible</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="border px-4 py-2 text-center">No hay estadísticas disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const options = {
                    responsive: true,
                    maintainAspectRatio: true,
                    cutout: '65%',
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: false },
                    },
                };

                const addCenterText = (chart, text, subtext) => {
                    const ctx = chart.ctx;
                    const width = chart.chartArea.width;
                    const height = chart.chartArea.height;
                    const centerX = chart.chartArea.left + width / 2;
                    const centerY = chart.chartArea.top + height / 2;

                    ctx.save();
                    ctx.font = 'bold 16px Arial';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.fillText(text, centerX, centerY - 10);
                    ctx.font = 'normal 12px Arial';
                    ctx.fillText(subtext, centerX, centerY + 10);
                    ctx.restore();
                };


                const dataTL = {
                    labels: ['Fallados', 'Encestados'],
                    datasets: [{
                        data: [{{ $jugador->intentosTL - $jugador->aciertosTL }}, {{ $jugador->aciertosTL }}],
                        backgroundColor: ['#F44336', '#4CAF50'],
                    }],
                };

                const dataT2 = {
                    labels: ['Fallados', 'Encestados'],
                    datasets: [{
                        data: [{{ $jugador->intentos2P - $jugador->aciertos2P }}, {{ $jugador->aciertos2P }}],
                        backgroundColor: ['#F44336', '#4CAF50'],
                    }],
                };

                const dataT3 = {
                    labels: ['Fallados', 'Encestados'],
                    datasets: [{
                        data: [{{ $jugador->intentos3P - $jugador->aciertos3P }}, {{ $jugador->aciertos3P }}],
                        backgroundColor: ['#F44336', '#4CAF50'],
                    }],
                };

                new Chart(document.getElementById('graficoTL'), {
                    type: 'doughnut',
                    data: dataTL,
                    options: options,
                    plugins: [{
                        id: 'centerText',
                        afterDraw: (chart) => {
                            const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            const encestados = chart.data.datasets[0].data[1];
                            const percentage = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                            const subtext = `${encestados}/${total}`;
                            addCenterText(chart, `${percentage}%`, subtext);
                        },
                    }],
                });

                new Chart(document.getElementById('graficoT2'), {
                    type: 'doughnut',
                    data: dataT2,
                    options: options,
                    plugins: [{
                        id: 'centerText',
                        afterDraw: (chart) => {
                            const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            const encestados = chart.data.datasets[0].data[1];
                            const percentage = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                            const subtext = `${encestados}/${total}`;
                            addCenterText(chart, `${percentage}%`, subtext);
                        },
                    }],
                });

                new Chart(document.getElementById('graficoT3'), {
                    type: 'doughnut',
                    data: dataT3,
                    options: options,
                    plugins: [{
                        id: 'centerText',
                        afterDraw: (chart) => {
                            const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            const encestados = chart.data.datasets[0].data[1];
                            const percentage = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                            const subtext = `${encestados}/${total}`;
                            addCenterText(chart, `${percentage}%`, subtext);
                        },
                    }],
                });
                @foreach ($jugador->estadisticas as $estadistica)
                    new Chart(document.getElementById('graficoTL-{{ $estadistica->id }}'), {
                        type: 'doughnut',
                        data: {
                            labels: ['Fallados', 'Encestados'],
                            datasets: [{
                                data: [{{ $estadistica->intentosTL - $estadistica->aciertosTL }}, {{ $estadistica->aciertosTL }}],
                                backgroundColor: ['#F44336', '#4CAF50'],
                            }],
                        },
                        options: options,
                        plugins: [{
                            id: 'centerText',
                            afterDraw: (chart) => {
                                const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                                const encestados = chart.data.datasets[0].data[1];
                                const percentage = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                                const subtext = `${encestados}/${total}`;
                                addCenterText(chart, `${percentage}%`, subtext);
                            },
                        }],
                    });

                    new Chart(document.getElementById('graficoT2-{{ $estadistica->id }}'), {
                        type: 'doughnut',
                        data: {
                            labels: ['Fallados', 'Encestados'],
                            datasets: [{
                                data: [{{ $estadistica->intentos2P - $estadistica->aciertos2P }}, {{ $estadistica->aciertos2P }}],
                                backgroundColor: ['#F44336', '#4CAF50'],
                            }],
                        },
                        options: options,
                        plugins: [{
                            id: 'centerText',
                            afterDraw: (chart) => {
                                const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                                const encestados = chart.data.datasets[0].data[1];
                                const percentage = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                                const subtext = `${encestados}/${total}`;
                                addCenterText(chart, `${percentage}%`, subtext);
                            },
                        }],
                    });

                    new Chart(document.getElementById('graficoT3-{{ $estadistica->id }}'), {
                        type: 'doughnut',
                        data: {
                            labels: ['Fallados', 'Encestados'],
                            datasets: [{
                                data: [{{ $estadistica->intentos3P - $estadistica->aciertos3P }}, {{ $estadistica->aciertos3P }}],
                                backgroundColor: ['#F44336', '#4CAF50'],
                            }],
                        },
                        options: options,
                        plugins: [{
                            id: 'centerText',
                            afterDraw: (chart) => {
                                const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                                const encestados = chart.data.datasets[0].data[1];
                                const percentage = total > 0 ? ((encestados / total) * 100).toFixed(0) : 0;
                                const subtext = `${encestados}/${total}`;
                                addCenterText(chart, `${percentage}%`, subtext);
                            },
                        }],
                    });
                @endforeach 
            });
        </script>
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
</x-app-layout>