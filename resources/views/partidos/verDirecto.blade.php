<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Marcador en Directo</h1>

        <div class="text-center mb-8">
            <div class="grid grid-cols-3 items-center">
                <div class="text-center">
                    <img src="{{ asset('storage/' . $partido->equipoLocal->escudo) }}" alt="Escudo Local"
                        class="w-20 h-20 object-cover rounded-full mx-auto">
                    <a href="{{ route('equipos.profile', $partido->idLocal) }}"
                        class="text-2xl font-bold mt-2">{{ $partido->equipoLocal->nombre }}</a>
                    <p class="text-4xl font-bold text-blue-500" id="ptsLocal">0</p>
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
                    <p class="text-4xl font-bold text-red-500" id="ptsVisitante">0</p>
                </div>
            </div>
        </div>

        <div class="relative flex justify-center mt-8">
            <div class="absolute left-1/2 top-0 h-full border-l-4 border-orange-400"
                style="transform: translateX(-50%); z-index:0;"></div>
            <div id="timeline" class="w-full flex flex-col gap-4 z-10"
                style="max-height: 500px; overflow-y: auto; padding-right: 8px;">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function actualizarMarcador() {
            $.ajax({
                url: "{{ route('partidos.actualizar', $partido->id) }}",
                method: "GET",
                success: function (data) {
                    $('#ptsLocal').text(data.ptsLocal);
                    $('#ptsVisitante').text(data.ptsVisitante);

                    let timeline = '';
                    data.acciones.forEach(acc => {
                        let accionTexto = '';
                        let icono = '';
                        switch (acc.accion) {
                            case 'acierto2P': accionTexto = 'anotó 2 puntos'; icono = '🏀'; break;
                            case 'acierto3P': accionTexto = 'anotó 3 puntos'; icono = '🎯'; break;
                            case 'aciertoTL': accionTexto = 'anotó 1 punto de tiro libre'; icono = '🏀'; break;
                            case 'rebote': accionTexto = 'capturó un rebote'; icono = '💪'; break;
                            case 'asistencia': accionTexto = 'dio una asistencia'; icono = '🪄'; break;
                            case 'robo': accionTexto = 'robó un balón'; icono = '🛡️'; break;
                            case 'intento2P': accionTexto = 'falló un tiro de 2 puntos'; icono = '❌'; break;
                            case 'intento3P': accionTexto = 'falló un triple'; icono = '❌'; break;
                            case 'intentoTL': accionTexto = 'falló un tiro libre'; icono = '❌'; break;
                            default: accionTexto = acc.accion + (acc.valor ? ' (' + acc.valor + ')' : ''); icono = '✨'; break;
                        }

                        if (acc.equipo == data.idLocal) {
                            timeline += `
        <div class="absolute left-1/2 w-1/2 pr-8" style="transform: translateX(-100%); position: relative;">
            <div class="flex items-center max-w-xl bg-blue-50 p-3 rounded-lg shadow border-l-8 border-blue-400">
                <img src="${acc.jugadorFoto}" alt="Foto del Jugador" class="w-12 h-12 rounded-full border-2 border-white shadow">
                <div class="flex-1 ml-3">
                    <p class="text-base font-bold text-gray-700">${acc.jugadorNombre} <span class="text-xs text-gray-400">[${acc.created_at}]</span></p>
                    <div class="flex items-center gap-2">
                        <span class="text-xl">${icono}</span>
                        <span class="text-sm text-gray-600">${accionTexto}</span>
                    </div>
                </div>
            </div>
        </div>
        `;
                        } else {
                            timeline += `
        <div class="absolute left-1/2 w-1/2 pl-8" style="position: relative;">
            <div class="flex items-center max-w-xl bg-red-50 p-3 rounded-lg shadow border-l-8 border-red-400">
                <img src="${acc.jugadorFoto}" alt="Foto del Jugador" class="w-12 h-12 rounded-full border-2 border-white shadow">
                <div class="flex-1 ml-3">
                    <p class="text-base font-bold text-gray-700">${acc.jugadorNombre} <span class="text-xs text-gray-400">[${acc.created_at}]</span></p>
                    <div class="flex items-center gap-2">
                        <span class="text-xl">${icono}</span>
                        <span class="text-sm text-gray-600">${accionTexto}</span>
                    </div>
                </div>
            </div>
        </div>
        `;
                        }
                    });
                    $('#timeline').html(timeline);
                },
                error: function (xhr, status, error) {
                    console.error('Error al actualizar el marcador:', error);
                }
            });
        }

        setInterval(actualizarMarcador, 5000);
        actualizarMarcador(); 
    </script>
</x-app-layout>