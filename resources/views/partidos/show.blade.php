<x-app-layout>
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold text-center mb-6">Detalle del Partido</h2>

        <!-- Selección de los 5 jugadores iniciales -->
        <div id="seleccionIniciales" class="bg-white shadow-md rounded-lg p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-bold text-center mb-4">Seleccionar 5 Iniciales - Equipo Local</h3>
                    <form id="formInicialLocal">
                        @foreach ($jugadoresLocal as $jugador)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 inicialLocal"
                                    value="{{ $jugador->id }}" id="local_{{ $jugador->id }}">
                                <label for="local_{{ $jugador->id }}" class="ml-2 text-gray-700">
                                    {{ $jugador->nombre }} - {{ $jugador->dorsal }}
                                </label>
                            </div>
                        @endforeach
                    </form>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-center mb-4">Seleccionar 5 Iniciales - Equipo Visitante</h3>
                    <form id="formInicialVisitante">
                        @foreach ($jugadoresVisitante as $jugador)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 inicialVisitante"
                                    value="{{ $jugador->id }}" id="visitante_{{ $jugador->id }}">
                                <label for="visitante_{{ $jugador->id }}" class="ml-2 text-gray-700">
                                    {{ $jugador->nombre }} - {{ $jugador->dorsal }}
                                </label>
                            </div>
                        @endforeach
                    </form>
                </div>
            </div>
            <div class="text-center mt-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700" onclick="guardarIniciales()">
                    Guardar Iniciales
                </button>
            </div>
        </div>

        <div id="contenidoPartido" class="hidden">
            <div class="text-center mt-6">
                <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 mr-4"
                    onclick="mostrarModalCambios()">Realizar Cambios</button>

                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700"
                    onclick="finalizarPartido()">Finalizar Partido</button>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Jugadores del equipo local -->
                    <div>
                        <h3 class="text-lg font-bold text-center mb-4">Equipo Local: {{ $partido->equipoLocal->nombre }}
                        </h3>
                        <div class="mb-4">
                            <label for="jugadorLocal" class="block text-gray-700 font-bold mb-2">Seleccionar
                                Jugador</label>
                            <select id="jugadorLocal" class="form-select w-full">
                                @foreach ($jugadoresLocal as $jugador)
                                    <option value="{{ $jugador->id }}">{{ $jugador->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2">
                            <button onclick="registrarAccion('intento2P', '{{ $partido->equipoLocal->id }}')"
                                class="bg-gray-700 text-white px-4 py-2 rounded w-full">Intento 2 Puntos</button>
                            <button onclick="registrarAccion('acierto2P', '{{ $partido->equipoLocal->id }}')"
                                class="bg-green-500 text-white px-4 py-2 rounded w-full">Acierto 2 Puntos</button>
                            <button onclick="registrarAccion('intento3P', '{{ $partido->equipoLocal->id }}')"
                                class="bg-gray-700 text-white px-4 py-2 rounded w-full">Intento 3 Puntos</button>
                            <button onclick="registrarAccion('acierto3P', '{{ $partido->equipoLocal->id }}')"
                                class="bg-green-500 text-white px-4 py-2 rounded w-full">Acierto 3 Puntos</button>
                            <button onclick="registrarAccion('intentoTL', '{{ $partido->equipoLocal->id }}')"
                                class="bg-gray-700 text-white px-4 py-2 rounded w-full">Intento Tiro Libre</button>
                            <button onclick="registrarAccion('aciertoTL', '{{ $partido->equipoLocal->id }}')"
                                class="bg-green-500 text-white px-4 py-2 rounded w-full">Acierto Tiro Libre</button>
                            <button onclick="registrarAccion('rebote', '{{ $partido->equipoLocal->id }}')"
                                class="bg-blue-500 text-white px-4 py-2 rounded w-full">Rebote</button>
                            <button onclick="registrarAccion('asistencia', '{{ $partido->equipoLocal->id }}')"
                                class="bg-yellow-500 text-white px-4 py-2 rounded w-full">Asistencia</button>
                            <button onclick="registrarAccion('robo', '{{ $partido->equipoLocal->id }}')"
                                class="bg-red-500 text-white px-4 py-2 rounded w-full">Robo</button>
                        </div>
                    </div>

                    <div class="text-center">
                        <h3 id="reloj" class="text-3xl font-bold mb-4">10:00</h3>
                        <button id="botonParar" class="bg-red-500 text-white px-4 py-2 rounded mb-2"
                            onclick="pararTiempo()">Parar Tiempo</button>
                        <button id="botonReanudar" class="bg-green-500 text-white px-4 py-2 rounded"
                            onclick="reanudarTiempo()">Reanudar Tiempo</button>
                        <img src="{{ asset('storage/cancha.png') }}" alt="Cancha de Baloncesto" class="mx-auto mt-4">
                        <div class="text-center mt-4">
                            <h2 class="text-2xl font-bold">Marcador en Directo</h2>
                            <div class="flex justify-center items-center space-x-8 mt-4">
                                <div class="text-center">
                                    <h3 class="text-lg font-bold">{{ $partido->equipoLocal->nombre }}</h3>
                                    <p id="puntosLocal" class="text-4xl font-bold text-blue-600">0</p>
                                </div>
                                <span class="text-3xl font-bold">-</span>
                                <div class="text-center">
                                    <h3 class="text-lg font-bold">{{ $partido->equipoVisitante->nombre }}</h3>
                                    <p id="puntosVisitante" class="text-4xl font-bold text-red-600">0</p>
                                </div>
                            </div>
                        </div>
                        <!-- Contenedor para los mensajes -->
                        <p id="mensajeEvento" class="text-lg font-bold text-gray-700 mt-4"></p>
                    </div>

                    <!-- Jugadores del equipo visitante -->
                    <div>
                        <h3 class="text-lg font-bold text-center mb-4">Equipo Visitante:
                            {{ $partido->equipoVisitante->nombre }}
                        </h3>
                        <div class="mb-4">
                            <label for="jugadorVisitante" class="block text-gray-700 font-bold mb-2">Seleccionar
                                Jugador</label>
                            <select id="jugadorVisitante" class="form-select w-full">
                                @foreach ($jugadoresVisitante as $jugador)
                                    <option value="{{ $jugador->id }}">{{ $jugador->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2">
                            <button onclick="registrarAccion('intento2P', '{{ $partido->equipoVisitante->id }}')"
                                class="bg-gray-700 text-white px-4 py-2 rounded w-full">Intento 2 Puntos</button>
                            <button onclick="registrarAccion('acierto2P', '{{ $partido->equipoVisitante->id }}')"
                                class="bg-green-500 text-white px-4 py-2 rounded w-full">Acierto 2 Puntos</button>
                            <button onclick="registrarAccion('intento3P', '{{ $partido->equipoVisitante->id }}')"
                                class="bg-gray-700 text-white px-4 py-2 rounded w-full">Intento 3 Puntos</button>
                            <button onclick="registrarAccion('acierto3P', '{{ $partido->equipoVisitante->id }}')"
                                class="bg-green-500 text-white px-4 py-2 rounded w-full">Acierto 3 Puntos</button>
                            <button onclick="registrarAccion('intentoTL', '{{ $partido->equipoVisitante->id }}')"
                                class="bg-gray-700 text-white px-4 py-2 rounded w-full">Intento Tiro Libre</button>
                            <button onclick="registrarAccion('aciertoTL', '{{ $partido->equipoVisitante->id }}')"
                                class="bg-green-500 text-white px-4 py-2 rounded w-full">Acierto Tiro Libre</button>
                            <button onclick="registrarAccion('rebote', '{{ $partido->equipoVisitante->id }}')"
                                class="bg-blue-500 text-white px-4 py-2 rounded w-full">Rebote</button>
                            <button onclick="registrarAccion('asistencia', '{{ $partido->equipoVisitante->id }}')"
                                class="bg-yellow-500 text-white px-4 py-2 rounded w-full">Asistencia</button>
                            <button onclick="registrarAccion('robo', '{{ $partido->equipoVisitante->id }}')"
                                class="bg-red-500 text-white px-4 py-2 rounded w-full">Robo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalCambios" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h3 class="text-lg font-bold mb-4">Realizar Cambio</h3>
            <div class="mb-4">
                <label for="equipoCambio" class="block text-gray-700 font-bold mb-2">Equipo</label>
                <select id="equipoCambio" class="form-select w-full" onchange="actualizarSelectCambio()">
                    <option value="" disabled selected>Seleccionar Equipo</option>
                    <option value="local">{{ $partido->equipoLocal->nombre }}</option>
                    <option value="visitante">{{ $partido->equipoVisitante->nombre }}</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="jugadorSale" class="block text-gray-700 font-bold mb-2">Jugador que Sale</label>
                <select id="jugadorSale" class="form-select w-full">
                    <option value="" disabled selected>Seleccionar Jugador</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="jugadorEntra" class="block text-gray-700 font-bold mb-2">Jugador que Entra</label>
                <select id="jugadorEntra" class="form-select w-full">
                    <option value="" disabled selected>Seleccionar Jugador</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 mr-2"
                    onclick="cerrarModalCambios()">Cancelar</button>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700"
                    onclick="realizarCambio()">Confirmar</button>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-8 hidden" id="estadisticas">
        <h2 class="text-2xl font-bold text-center mb-6">Estadísticas en Tiempo Real</h2>

        <!-- Tabla para el equipo local -->
        <h3 class="text-xl font-bold text-blue-600 mb-4">Equipo Local: {{ $partido->equipoLocal->nombre }}</h3>
        <table id="tablaEstadisticasLocal" class="table-auto w-full border-collapse border border-gray-300 mb-8">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-2">Jugador</th>
                    <th class="border px-4 py-2">Puntos</th>
                    <th class="border px-4 py-2">Rebotes</th>
                    <th class="border px-4 py-2">Asistencias</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jugadoresLocal as $jugador)
                    <tr data-equipo="local" data-id="{{ $jugador->id }}">
                        <td class="border px-4 py-2">{{ $jugador->nombre }}</td>
                        <td class="border px-4 py-2">
                            <input type="number" class="form-input w-full text-center puntos" value="0">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="number" class="form-input w-full text-center rebotes" value="0">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="number" class="form-input w-full text-center asistencias" value="0">
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700"
                                onclick="guardarEstadisticas(this)">Guardar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tabla para el equipo visitante -->
        <h3 class="text-xl font-bold text-red-600 mb-4">Equipo Visitante: {{ $partido->equipoVisitante->nombre }}</h3>
        <table id="tablaEstadisticasVisitante" class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-2">Jugador</th>
                    <th class="border px-4 py-2">Puntos</th>
                    <th class="border px-4 py-2">Rebotes</th>
                    <th class="border px-4 py-2">Asistencias</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jugadoresVisitante as $jugador)
                    <tr data-equipo="visitante" data-id="{{ $jugador->id }}">
                        <td class="border px-4 py-2">{{ $jugador->nombre }}</td>
                        <td class="border px-4 py-2">
                            <input type="number" class="form-input w-full text-center puntos" value="0">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="number" class="form-input w-full text-center rebotes" value="0">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="number" class="form-input w-full text-center asistencias" value="0">
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700"
                                onclick="guardarEstadisticas(this)">Guardar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

<script>
    let tiempoRestante = 600;
    let intervalo;
    let inicialesLocal = [];
    let inicialesVisitante = [];
    let tiempoJugadoLocal = {};
    let tiempoJugadoVisitante = {};
    let relojCorriendo = false;
    let jugadoresActivosLocal = [];
    let jugadoresActivosVisitante = [];
    let puntosLocal = 0;
    let puntosVisitante = 0;

    function actualizarMarcador(equipo, puntos) {
        if (equipo === 'local') {
            puntosLocal += puntos;
            document.getElementById('puntosLocal').textContent = puntosLocal;
        } else if (equipo === 'visitante') {
            puntosVisitante += puntos;
            document.getElementById('puntosVisitante').textContent = puntosVisitante;
        }
    }
    function iniciarCuentaAtras() {
        relojCorriendo = true;
        intervalo = setInterval(() => {
            if (tiempoRestante <= 0) {
                clearInterval(intervalo);
                relojCorriendo = false;
                return;
            }
            tiempoRestante--;
            actualizarReloj();

            jugadoresActivosLocal.forEach(id => tiempoJugadoLocal[id] += 1);
            jugadoresActivosVisitante.forEach(id => tiempoJugadoVisitante[id] += 1);

            actualizarMinutosJugados();
        }, 1000);
    }

    function actualizarMinutosJugados() {
        const selectLocal = document.getElementById('jugadorLocal');
        Array.from(selectLocal.options).forEach(option => {
            const idJugador = option.value;
            if (tiempoJugadoLocal[idJugador]) {
                option.textContent = `${option.dataset.nombre} (${Math.floor(tiempoJugadoLocal[idJugador] / 60)}:${(tiempoJugadoLocal[idJugador] % 60).toString().padStart(2, '0')})`;
            }
        });

        const selectVisitante = document.getElementById('jugadorVisitante');
        Array.from(selectVisitante.options).forEach(option => {
            const idJugador = option.value;
            if (tiempoJugadoVisitante[idJugador]) {
                option.textContent = `${option.dataset.nombre} (${Math.floor(tiempoJugadoVisitante[idJugador] / 60)}:${(tiempoJugadoVisitante[idJugador] % 60).toString().padStart(2, '0')})`;
            }
        });
    }

    function actualizarReloj() {
        const minutos = Math.floor(tiempoRestante / 60);
        const segundos = tiempoRestante % 60;
        document.getElementById('reloj').textContent = `${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
    }

    function pararTiempo() {
        clearInterval(intervalo);
        relojCorriendo = false;
    }

    function reanudarTiempo() {
        clearInterval(intervalo);
        iniciarCuentaAtras();
    }

    function guardarIniciales() {
        inicialesLocal = Array.from(document.querySelectorAll('.inicialLocal:checked')).map(input => input.value);
        inicialesVisitante = Array.from(document.querySelectorAll('.inicialVisitante:checked')).map(input => input.value);

        if (inicialesLocal.length !== 5 || inicialesVisitante.length !== 5) {
            alert("Debes seleccionar exactamente 5 jugadores para cada equipo.");
            return;
        }

        alert("Jugadores iniciales guardados correctamente.");

        inicialesLocal.forEach(id => tiempoJugadoLocal[id] = 0);
        inicialesVisitante.forEach(id => tiempoJugadoVisitante[id] = 0);

        document.getElementById('seleccionIniciales').style.display = 'none';
        document.getElementById('contenidoPartido').style.display = 'block';
        document.getElementById('estadisticas').style.display = 'block';

        jugadoresActivosLocal = [...inicialesLocal];
        jugadoresActivosVisitante = [...inicialesVisitante];

        actualizarSelectJugadores('jugadorLocal', jugadoresActivosLocal, @json($jugadoresLocal));
        actualizarSelectJugadores('jugadorVisitante', jugadoresActivosVisitante, @json($jugadoresVisitante));
    }

    async function finalizarPartido() {
        confirmar = confirm("¿Estás seguro de que deseas finalizar el partido?");
        if (confirmar) {
            try {
                fetch('{{ route('partidos.finalizar') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        idPartido: {{ $partido->id }},
                        idLocal: {{ $partido->idLocal }},
                        idVisitante: {{ $partido->idVisitante }},
                        tiempoJugadoLocal: tiempoJugadoLocal,
                        tiempoJugadoVisitante: tiempoJugadoVisitante,
                    }),
                })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        window.location.href = '{{ route('partidos.estadisticas', $partido->id) }}';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert("Ocurrió un error al finalizar el partido.");
                    });
            } catch (error) {
                alert("Ocurrió un error inesperado.");
            }
        }

    }
    function registrarAccion(accion, idEquipo) {
        const idPartido = {{ $partido->id }};

        let selectJugador;
        if (idEquipo == {{ $partido->idLocal }}) {
            selectJugador = document.querySelector('#jugadorLocal');
        } else if (idEquipo == {{ $partido->idVisitante }}) {
            selectJugador = document.querySelector('#jugadorVisitante');
        } else {
            mostrarMensaje("Equipo no válido.", "text-red-500");
            return;
        }

        const idJugador = selectJugador.options[selectJugador.selectedIndex]?.value;

        if (!idJugador) {
            mostrarMensaje("Por favor, selecciona un jugador.", "text-red-500");
            return;
        }

        let puntos = 0;
        if (accion === 'acierto2P') puntos = 2;
        if (accion === 'acierto3P') puntos = 3;
        if (accion === 'aciertoTL') puntos = 1;

        if (puntos > 0) {
            if (idEquipo == {{ $partido->idLocal }}) {
                actualizarMarcador('local', puntos);
            } else if (idEquipo == {{ $partido->idVisitante }}) {
                actualizarMarcador('visitante', puntos);
            }
        }

        const tablaId = idEquipo == {{ $partido->idLocal }} ? 'tablaEstadisticasLocal' : 'tablaEstadisticasVisitante';
        const filaJugador = document.querySelector(`#${tablaId} tr[data-id="${idJugador}"]`);
        if (filaJugador) {
            const inputPuntos = filaJugador.querySelector('.puntos');
            inputPuntos.value = parseInt(inputPuntos.value || 0) + puntos;

            if (accion === 'rebote') {
                const inputRebotes = filaJugador.querySelector('.rebotes');
                inputRebotes.value = parseInt(inputRebotes.value || 0) + 1;
            }

            if (accion === 'asistencia') {
                const inputAsistencias = filaJugador.querySelector('.asistencias');
                inputAsistencias.value = parseInt(inputAsistencias.value || 0) + 1;
            }
        }

        fetch('{{ route('partidos.registrarAccion') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                idPartido: idPartido,
                idEquipo: idEquipo,
                idJugador: idJugador,
                accion: accion,
            }),
        })
            .then(response => response.json())
            .then(data => {
                mostrarMensaje(accion + " registrado correctamente", "text-green-500");
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarMensaje("Ocurrió un error al registrar la acción.", "text-red-500");
            });
    }

    function mostrarMensaje(mensaje, clase) {
        const mensajeEvento = document.getElementById('mensajeEvento');
        mensajeEvento.innerText = mensaje;
        mensajeEvento.className = `text-lg font-bold mt-4 ${clase}`;

        setTimeout(() => {
            mensajeEvento.innerText = "";
            mensajeEvento.className = "";
        }, 2000);
    }

    function mostrarModalCambios() {
        document.getElementById('modalCambios').classList.remove('hidden');
    }

    function cerrarModalCambios() {
        document.getElementById('modalCambios').classList.add('hidden');
    }

    function actualizarSelectCambio() {
        const equipo = document.getElementById('equipoCambio').value;
        const selectSale = document.getElementById('jugadorSale');
        const selectEntra = document.getElementById('jugadorEntra');

        selectSale.innerHTML = '<option value="" disabled selected>Seleccionar Jugador</option>';
        selectEntra.innerHTML = '<option value="" disabled selected>Seleccionar Jugador</option>';

        const activos = equipo === 'local' ? jugadoresActivosLocal : jugadoresActivosVisitante;
        const jugadores = equipo === 'local' ? @json($jugadoresLocal) : @json($jugadoresVisitante);

        activos.forEach(id => {
            const jugador = jugadores.find(j => j.id == id);
            if (jugador) {
                const option = document.createElement('option');
                option.value = jugador.id;
                option.textContent = jugador.nombre;
                selectSale.appendChild(option);
            }
        });

        jugadores.forEach(jugador => {
            if (!activos.includes(jugador.id.toString())) {
                const option = document.createElement('option');
                option.value = jugador.id;
                option.textContent = jugador.nombre;
                selectEntra.appendChild(option);
            }
        });
    }

    function realizarCambio() {
        const equipo = document.getElementById('equipoCambio').value;
        const jugadorSale = document.getElementById('jugadorSale').value;
        const jugadorEntra = document.getElementById('jugadorEntra').value;

        if (!equipo || !jugadorSale || !jugadorEntra) {
            alert("Debes seleccionar el equipo, el jugador que sale y el jugador que entra.");
            return;
        }

        const activos = equipo === 'local' ? jugadoresActivosLocal : jugadoresActivosVisitante;

        const index = activos.indexOf(jugadorSale);
        if (index !== -1) {
            activos[index] = jugadorEntra;

            if (equipo === 'local') {
                if (!tiempoJugadoLocal[jugadorEntra]) tiempoJugadoLocal[jugadorEntra] = 0;
            } else {
                if (!tiempoJugadoVisitante[jugadorEntra]) tiempoJugadoVisitante[jugadorEntra] = 0;
            }
        }

        actualizarSelectJugadores('jugadorLocal', jugadoresActivosLocal, @json($jugadoresLocal));
        actualizarSelectJugadores('jugadorVisitante', jugadoresActivosVisitante, @json($jugadoresVisitante));
        actualizarSelectCambio();

        alert("Cambio realizado correctamente.");
        cerrarModalCambios();
    }

    function actualizarSelectJugadores(selectId, activos, jugadores) {
        const select = document.getElementById(selectId);
        select.innerHTML = '';

        activos.forEach(id => {
            const jugador = jugadores.find(j => j.id == id);
            if (jugador) {
                const option = document.createElement('option');
                option.value = jugador.id;
                option.dataset.nombre = jugador.nombre;
                option.textContent = `${jugador.nombre} (${Math.floor((tiempoJugadoLocal[jugador.id] || 0) / 60)}:${((tiempoJugadoLocal[jugador.id] || 0) % 60).toString().padStart(2, '0')})`;
                select.appendChild(option);
            }
        });
    }

    function guardarEstadisticas(button) {
        const row = button.closest('tr');
        const equipo = row.dataset.equipo;
        const idJugador = row.dataset.id;

        const nuevosPuntos = parseInt(row.querySelector('.puntos').value) || 0;
        const nuevosRebotes = parseInt(row.querySelector('.rebotes').value) || 0;
        const nuevasAsistencias = parseInt(row.querySelector('.asistencias').value) || 0;

        fetch('{{ route('partidos.actualizarEstadisticas') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                idPartido: {{ $partido->id }},
                idJugador: idJugador,
                equipo: equipo,
                puntos: nuevosPuntos,
                rebotes: nuevosRebotes,
                asistencias: nuevasAsistencias,
            }),
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message || 'Estadísticas actualizadas correctamente.');
                //Esto para que si cambian puntos se actualize el marcador
                recalcularMarcador(equipo);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al actualizar las estadísticas.');
            });
    }
    function recalcularMarcador(equipo) {
        let totalPuntos = 0;

        const tablaId = equipo === 'local' ? 'tablaEstadisticasLocal' : 'tablaEstadisticasVisitante';
        const filas = document.querySelectorAll(`#${tablaId} tbody tr`);

        filas.forEach(fila => {
            const puntos = parseInt(fila.querySelector('.puntos').value) || 0;
            totalPuntos += puntos;
        });

        if (equipo === 'local') {
            puntosLocal = totalPuntos;
            document.getElementById('puntosLocal').textContent = puntosLocal;
        } else if (equipo === 'visitante') {
            puntosVisitante = totalPuntos;
            document.getElementById('puntosVisitante').textContent = puntosVisitante;
        }
    }
</script>