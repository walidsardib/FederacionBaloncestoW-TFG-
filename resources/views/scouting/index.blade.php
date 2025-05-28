<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Scouting</h1>
        <h2>Filtrar por Liga:</h2>
        <select name="filtroLiga" id="filtroLiga" class="form-input mt-1 block w-full">
            <option value="">Todas las ligas</option>
            @foreach ($ligas as $liga)
                <option value="{{ $liga->id }}">{{ $liga->nombre }}</option>
            @endforeach
        </select>
        <div class="overflow-x-auto rounded-lg shadow-lg mt-6">
            <table id="jugadoresTable" class="min-w-full bg-white rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-orange-600 to-orange-400 text-white text-lg">
                        <th class="border px-4 py-3 hidden rounded-tl-lg">Liga</th>
                        <th class="border px-4 py-3">Foto</th>
                        <th class="border px-4 py-3">Nombre</th>
                        <th class="border px-4 py-3">PJ</th>
                        <th class="border px-4 py-3">MIN</th>
                        <th class="border px-4 py-3">MIN/P</th>
                        <th class="border px-4 py-3">PTS</th>
                        <th class="border px-4 py-3">PTS/P</th>
                        <th class="border px-4 py-3">TL</th>
                        <th class="border px-4 py-3">T2</th>
                        <th class="border px-4 py-3">T3</th>
                        <th class="border px-4 py-3 rounded-tr-lg"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jugadores as $jugador)
                        <tr class="hover:bg-orange-100 transition-colors duration-200 border-b last:border-b-0">
                            <td class="hidden">{{ $jugador->equipo->liga->id ?? '' }}</td>
                            <td class="border px-4 py-3 text-center">
                                @if ($jugador->foto)
                                    <img src="{{ asset('storage/' . $jugador->foto) }}" alt="Foto de {{ $jugador->nombre }}"
                                        class="w-14 h-14 rounded-full mx-auto shadow-md border-2 border-orange-300">
                                @else
                                    <span class="text-gray-400 italic">Sin foto</span>
                                @endif
                            </td>
                            <td class="border px-4 py-3 font-bold text-gray-800">{{ $jugador->nombre }}</td>
                            <td class="border px-4 py-3 text-center">{{ $jugador->pJugados ?? 0 }}</td>
                            <td class="border px-4 py-3 text-center">{{ $jugador->mins ?? 0 }}</td>
                            <td class="border px-4 py-3 text-center">{{ $jugador->minsPP ?? 0 }}</td>
                            <td class="border px-4 py-3 text-center">{{ $jugador->pts ?? 0 }}</td>
                            <td class="border px-4 py-3 text-center">{{ $jugador->ptsPP ?? 0 }}</td>
                            <td class="border px-4 py-3 text-center">
                                <canvas id="graficoTL-{{ $jugador->id }}" width="50" height="50"></canvas>
                            </td>
                            <td class="border px-4 py-3 text-center">
                                <canvas id="graficoT2-{{ $jugador->id }}" width="50" height="50"></canvas>
                            </td>
                            <td class="border px-4 py-3 text-center">
                                <canvas id="graficoT3-{{ $jugador->id }}" width="50" height="50"></canvas>
                            </td>
                            <td class="border px-4 py-3 text-center">
                                <a href="{{ route('jugadores.index', $jugador->id) }}"
                                    class="text-orange-600 hover:text-orange-800 transition-colors duration-150">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        $(document).ready(function () {

            const table = $('#jugadoresTable').DataTable({
                responsive: true,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                },
                autoWidth: false,
                pageLength: 10,
                columnDefs: [
                    { targets: 0, visible: false },
                ],
                order: [[6, 'desc']],
            });

            $('#filtroLiga').on('change', function () {
                const ligaId = $(this).val();
                if (ligaId) {
                    table.column(0).search('^' + ligaId + '$', true, false).draw();
                } else {
                    table.column(0).search('').draw();
                }
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