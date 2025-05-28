<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="text-center mb-8 bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-6">Marcador</h1>
            <div class="grid grid-cols-3 items-center">
                <div class="text-center">
                    <img src="{{ asset('storage/' . $partido->equipoLocal->escudo) }}" alt="Escudo Local"
                        class="w-20 h-20 object-cover rounded-full mx-auto">
                    <a href="{{ route('equipos.profile', $partido->idLocal) }}"
                        class="text-2xl font-bold mt-2">{{ $partido->equipoLocal->nombre }}</a>
                    <p class="text-4xl font-bold text-blue-500">{{ $partido->ptsLocal }}</p>
                </div>

                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-700">VS</h2>
                    <p class="text-sm text-gray-500 mt-2">
                        {{ \Carbon\Carbon::parse($partido->fecha)->format('d/m/Y') }} -
                        {{ \Carbon\Carbon::parse($partido->hora)->format('H:i') }}
                    </p>
                    <p class="text-sm text-gray-500">{{ $partido->equipoLocal->pabellon }}</p>
                </div>

                <div class="text-center">
                    <img src="{{ asset('storage/' . $partido->equipoVisitante->escudo) }}" alt="Escudo Visitante"
                        class="w-20 h-20 object-cover rounded-full mx-auto">
                    <a href="{{ route('equipos.profile', $partido->idVisitante) }}"
                        class="text-2xl font-bold mt-2">{{ $partido->equipoVisitante->nombre }}</a>
                    <p class="text-4xl font-bold text-red-500">{{ $partido->ptsVisitante }}</p>
                </div>
            </div>
        </div>

        <!-- Gráficos de Estadísticas de Equipos -->
        <div class="grid grid-cols-2 gap-8 mb-8 bg-white shadow-md rounded-lg p-6">
            <div class="text-center">
                <h2 class="text-xl font-bold mb-4">Estadísticas - {{ $partido->equipoLocal->nombre }}</h2>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Tiros Libres</p>
                        <canvas id="graficoTirosLibresLocal" class="mx-auto" width="100" height="100"></canvas>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tiros de 2</p>
                        <canvas id="graficoTiros2Local" class="mx-auto" width="100" height="100"></canvas>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tiros de 3</p>
                        <canvas id="graficoTiros3Local" class="mx-auto" width="100" height="100"></canvas>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <h2 class="text-xl font-bold mb-4">Estadísticas - {{ $partido->equipoVisitante->nombre }}</h2>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Tiros Libres</p>
                        <canvas id="graficoTirosLibresVisitante" class="mx-auto" width="100" height="100"></canvas>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tiros de 2</p>
                        <canvas id="graficoTiros2Visitante" class="mx-auto" width="100" height="100"></canvas>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tiros de 3</p>
                        <canvas id="graficoTiros3Visitante" class="mx-auto" width="100" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-center text-xl font-bold bg-white shadow-md rounded-lg p-6"> JUGADORES DESTACADOS</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center bg-white shadow-md rounded-lg p-6">

        <!-- Jugador Destacado Local -->
        <div class="text-center">
            <img src="{{ asset('storage/' . $jugadorLoc->foto) }}" alt="Foto del Jugador"
                class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
            <p class="text-lg font-bold">#{{ $jugadorLoc->dorsal }} {{ $jugadorLoc->nombre }}</p>
            <hr class="border-t-2 border-orange-300 my-4">
            <p class="text-4xl font-bold text-blue-500">{{ $jugadorDestacadoLocal->puntos }}</p>
            <p class="text-gray-500">PTS</p>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div>
                    <p class="text-sm text-gray-500">Rebotes</p>
                    <p class="text-lg font-bold">{{ $jugadorDestacadoLocal->rebotes }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Asistencias</p>
                    <p class="text-lg font-bold">{{ $jugadorDestacadoLocal->asistencias }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Robos</p>
                    <p class="text-lg font-bold">{{ $jugadorDestacadoLocal->robos }}</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-6">
                <div>
                    <p class="text-sm text-gray-500">Tiros Libres</p>
                    <canvas id="graficoTLLocal" class="mx-auto" width="100" height="100"></canvas>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tiros de 2</p>
                    <canvas id="graficoT2Local" class="mx-auto" width="100" height="100"></canvas>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tiros de 3</p>
                    <canvas id="graficoT3Local" class="mx-auto" width="100" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Jugador Destacado Visitante -->
        <div class="text-center">
            <img src="{{ asset('storage/' . $jugadorVis->foto) }}" alt="Foto del Jugador"
                class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
            <p class="text-lg font-bold">#{{ $jugadorVis->dorsal }} {{ $jugadorVis->nombre }}</p>
            <hr class="border-t-2 border-orange-300 my-4">
            <p class="text-4xl font-bold text-red-500">{{ $jugadorDestacadoVisitante->puntos }}</p>
            <p class="text-gray-500">PTS</p>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div>
                    <p class="text-sm text-gray-500">Rebotes</p>
                    <p class="text-lg font-bold">{{ $jugadorDestacadoVisitante->rebotes }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Asistencias</p>
                    <p class="text-lg font-bold">{{ $jugadorDestacadoVisitante->asistencias }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Robos</p>
                    <p class="text-lg font-bold">{{ $jugadorDestacadoVisitante->robos }}</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-6">
                <div>
                    <p class="text-sm text-gray-500">Tiros Libres</p>
                    <canvas id="graficoTLVisitante" class="mx-auto" width="100" height="100"></canvas>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tiros de 2</p>
                    <canvas id="graficoT2Visitante" class="mx-auto" width="100" height="100"></canvas>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tiros de 3</p>
                    <canvas id="graficoT3Visitante" class="mx-auto" width="100" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <h2 class="text-xl font-bold text-center mb-4">Estadísticas - {{ $partido->equipoLocal->nombre }}</h2>
            <table
                class="table-auto w-full border-collapse border border-gray-300 rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-orange-500 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Jugador</th>
                        <th class="px-4 py-2 text-left">Puntos</th>
                        <th class="px-4 py-2 text-left">Rebotes</th>
                        <th class="px-4 py-2 text-left">Asistencias</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estadisticasLocal as $estadistica)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 transition-colors">
                            <td class="border px-4 py-2">
                                <a href="{{ route('jugadores.index', $estadistica->jugador->id) }}"
                                    class="text-orange-600 hover:underline">
                                    <strong>{{ $estadistica->jugador->nombre }}</strong>
                                </a>
                            </td>
                            <td class="border px-4 py-2 text-center font-bold">{{ $estadistica->puntos }}</td>
                            <td class="border px-4 py-2 text-center">{{ $estadistica->rebotes }}</td>
                            <td class="border px-4 py-2 text-center">{{ $estadistica->asistencias }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <h2 class="text-xl font-bold text-center mb-4">Estadísticas - {{ $partido->equipoVisitante->nombre }}
            </h2>
            <table
                class="table-auto w-full border-collapse border border-gray-300 rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-orange-500 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Jugador</th>
                        <th class="px-4 py-2 text-left">Puntos</th>
                        <th class="px-4 py-2 text-left">Rebotes</th>
                        <th class="px-4 py-2 text-left">Asistencias</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estadisticasVisitante as $estadistica)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 transition-colors">
                            <td class="border px-4 py-2">
                                <a href="{{ route('jugadores.index', $estadistica->jugador->id) }}"
                                    class="text-orange-600 hover:underline">
                                    <strong>{{ $estadistica->jugador->nombre }}</strong>
                                </a>
                            </td>
                            <td class="border px-4 py-2 text-center font-bold">{{ $estadistica->puntos }}</td>
                            <td class="border px-4 py-2 text-center">{{ $estadistica->rebotes }}</td>
                            <td class="border px-4 py-2 text-center">{{ $estadistica->asistencias }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const options = {
            responsive: false,
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

        const dataTLLocal = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $jugadorDestacadoLocal->intentosTL - $jugadorDestacadoLocal->aciertosTL }}, {{ $jugadorDestacadoLocal->aciertosTL }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };

        const dataT2Local = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $jugadorDestacadoLocal->intentos2P - $jugadorDestacadoLocal->aciertos2P }}, {{ $jugadorDestacadoLocal->aciertos2P }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };

        const dataT3Local = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $jugadorDestacadoLocal->intentos3P - $jugadorDestacadoLocal->aciertos3P }}, {{ $jugadorDestacadoLocal->aciertos3P }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };
        const dataTLVisitante = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $jugadorDestacadoVisitante->intentosTL - $jugadorDestacadoVisitante->aciertosTL }}, {{ $jugadorDestacadoVisitante->aciertosTL }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };

        const dataT2Visitante = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $jugadorDestacadoVisitante->intentos2P - $jugadorDestacadoVisitante->aciertos2P }}, {{ $jugadorDestacadoVisitante->aciertos2P }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };

        const dataT3Visitante = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $jugadorDestacadoVisitante->intentos3P - $jugadorDestacadoVisitante->aciertos3P }}, {{ $jugadorDestacadoVisitante->aciertos3P }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };



        new Chart(document.getElementById('graficoTLLocal'), {
            type: 'doughnut',
            data: dataTLLocal,
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

        new Chart(document.getElementById('graficoT2Local'), {
            type: 'doughnut',
            data: dataT2Local,
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

        new Chart(document.getElementById('graficoT3Local'), {
            type: 'doughnut',
            data: dataT3Local,
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

        new Chart(document.getElementById('graficoTLVisitante'), {
            type: 'doughnut',
            data: dataTLVisitante,
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

        new Chart(document.getElementById('graficoT2Visitante'), {
            type: 'doughnut',
            data: dataT2Visitante,
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

        new Chart(document.getElementById('graficoT3Visitante'), {
            type: 'doughnut',
            data: dataT3Visitante,
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


        //GRAFICOS STATS EQUIPOS

        const dataTirosLibresLocal = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $estadisticasLocal->sum('intentosTL') - $estadisticasLocal->sum('aciertosTL') }}, {{ $estadisticasLocal->sum('aciertosTL') }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };

        const dataTiros2Local = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $estadisticasLocal->sum('intentos2P') - $estadisticasLocal->sum('aciertos2P') }}, {{ $estadisticasLocal->sum('aciertos2P') }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };

        const dataTiros3Local = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $estadisticasLocal->sum('intentos3P') - $estadisticasLocal->sum('aciertos3P') }}, {{ $estadisticasLocal->sum('aciertos3P') }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };

        new Chart(document.getElementById('graficoTirosLibresLocal'), {
            type: 'doughnut',
            data: dataTirosLibresLocal,
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

        new Chart(document.getElementById('graficoTiros2Local'), {
            type: 'doughnut',
            data: dataTiros2Local,
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

        new Chart(document.getElementById('graficoTiros3Local'), {
            type: 'doughnut',
            data: dataTiros3Local,
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

        const dataTirosLibresVisitante = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $estadisticasVisitante->sum('intentosTL') - $estadisticasVisitante->sum('aciertosTL') }}, {{ $estadisticasVisitante->sum('aciertosTL') }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };

        const dataTiros2Visitante = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $estadisticasVisitante->sum('intentos2P') - $estadisticasVisitante->sum('aciertos2P') }}, {{ $estadisticasVisitante->sum('aciertos2P') }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };

        const dataTiros3Visitante = {
            labels: ['Fallados', 'Encestados'],
            datasets: [{
                data: [{{ $estadisticasVisitante->sum('intentos3P') - $estadisticasVisitante->sum('aciertos3P') }}, {{ $estadisticasVisitante->sum('aciertos3P') }}],
                backgroundColor: ['#F44336', '#4CAF50'],
            }],
        };

        new Chart(document.getElementById('graficoTirosLibresVisitante'), {
            type: 'doughnut',
            data: dataTirosLibresVisitante,
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

        new Chart(document.getElementById('graficoTiros2Visitante'), {
            type: 'doughnut',
            data: dataTiros2Visitante,
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

        new Chart(document.getElementById('graficoTiros3Visitante'), {
            type: 'doughnut',
            data: dataTiros3Visitante,
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
    });

</script>