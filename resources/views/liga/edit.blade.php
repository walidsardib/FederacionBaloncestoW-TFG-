<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Editar Liga</h1>
        <form action="{{ route('ligas.update', $liga->id) }}" method="POST" class="bg-white shadow rounded p-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700">Nombre de la Liga</label>
                <input type="text" name="nombre" id="nombre" value="{{ $liga->nombre }}"
                    class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="temporada" class="block text-gray-700">Temporada</label>
                <input type="text" name="temporada" id="temporada" value="{{ $liga->temporada->nombre }}"
                    class="form-input mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="equipos" class="block text-gray-700">Equipos</label>
                <select id="equipos" class="form-input mt-1 block w-full">
                    @foreach ($equipos as $equipo)
                        @if (!$liga->equipos->contains($equipo->id))
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                        @endif
                    @endforeach
                </select>
                <button type="button" id="add-equipo" class="bg-green-500 text-white px-4 py-2 rounded mt-2">Añadir
                    Equipo</button>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-bold mb-2">Equipos Seleccionados</h3>
                <ul id="equipos-seleccionados" class="list-disc pl-5">
                    @foreach ($liga->equipos as $equipo)
                        <li data-id="{{ $equipo->id }}">
                            {{ $equipo->nombre }}
                            <button type="button" class="text-red-500 ml-2 remove-equipo">Eliminar</button>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-bold mb-2">Jornadas</h3>
                <ul id="jornadas-list" class="list-disc pl-5">
                    @foreach ($liga->jornadas as $jornada)
                        <li>
                            {{ $jornada->nombre }} (Inicio:
                            {{ \Carbon\Carbon::parse($jornada->fechaInicio)->format('d/m/y') }}, Fin:
                            {{ \Carbon\Carbon::parse($jornada->fechaFin)->format('d/m/y') }})
                            <button type="button" class="text-red-500 ml-2 remove-jornada">Eliminar</button>
                            <input type="hidden" name="jornadas[]"
                                value='@json(["nombre" => $jornada->nombre, "inicio" => $jornada->fechaInicio, "fin" => $jornada->fechaFin])'>
                        </li>
                    @endforeach
                </ul>
                <div class="flex items-center mb-2 space-x-2">
                    <input type="text" id="jornada-nombre" placeholder="Nombre de la jornada"
                        class="form-input mt-1 block w-1/3">
                    <input type="date" id="jornada-inicio" class="form-input mt-1 block w-1/3"
                        placeholder="Fecha de inicio">
                    <input type="date" id="jornada-fin" class="form-input mt-1 block w-1/3" placeholder="Fecha de fin">
                    <button type="button" id="add-jornada" class="bg-green-500 text-white px-4 py-2 rounded">Añadir
                        Jornada</button>
                </div>
            </div>
            <div id="jornadas-input-container"></div>
            <div id="jornadas-data" data-jornadas='@json($liga->jornadas)'></div>
            <div id="equipos-input-container"></div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('ligas.delete', $liga->id) }}" class="bg-red-500 text-white px-4 py-2 rounded">Borrar</a>

        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const equiposSelect = document.getElementById('equipos');
            const addEquipoButton = document.getElementById('add-equipo');
            const equiposSeleccionados = document.getElementById('equipos-seleccionados');
            const equiposInputContainer = document.getElementById('equipos-input-container');
            const jornadasList = document.getElementById('jornadas-list');
            const addJornadaButton = document.getElementById('add-jornada');
            const jornadaNombreInput = document.getElementById('jornada-nombre');
            const jornadaInicioInput = document.getElementById('jornada-inicio');
            const jornadaFinInput = document.getElementById('jornada-fin');
            const jornadasInputContainer = document.getElementById('jornadas-input-container');

            let equipos = [];
            let jornadas = [];

            document.querySelectorAll('.remove-equipo').forEach(button => {
                button.addEventListener('click', (e) => {
                    const li = e.target.closest('li');
                    const equipoId = parseInt(li.dataset.id);

                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'equipos_eliminados[]';
                    input.value = equipoId;
                    equiposInputContainer.appendChild(input);

                    li.remove();
                });
            });

            document.querySelectorAll('.remove-jornada').forEach(button => {
                button.addEventListener('click', (e) => {
                    const li = e.target.closest('li');
                    const jornadaNombre = li.textContent.split(' (')[0].trim();
                    jornadas = jornadas.filter(j => j.nombre !== jornadaNombre);
                    li.remove();
                    updateJornadasInput();
                });
            });

            addEquipoButton.addEventListener('click', () => {
                const equipoId = parseInt(equiposSelect.value);
                const equipoNombre = equiposSelect.options[equiposSelect.selectedIndex].text;

                if (!equipos.includes(equipoId)) {
                    equipos.push(equipoId);

                    const li = document.createElement('li');
                    li.textContent = equipoNombre;
                    li.dataset.id = equipoId;

                    const removeButton = document.createElement('button');
                    removeButton.textContent = 'Eliminar';
                    removeButton.classList.add('text-red-500', 'ml-2', 'remove-equipo');
                    removeButton.addEventListener('click', () => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'equipos_eliminados[]';
                        input.value = equipoId;
                        equiposInputContainer.appendChild(input);

                        li.remove();
                    });

                    li.appendChild(removeButton);
                    equiposSeleccionados.appendChild(li);

                    updateEquiposInput();
                }
            });

            addJornadaButton.addEventListener('click', () => {
                const jornadaNombre = jornadaNombreInput.value.trim();
                const jornadaInicio = jornadaInicioInput.value;
                const jornadaFin = jornadaFinInput.value;

                if (jornadaNombre !== '' && jornadaInicio !== '' && jornadaFin !== '') {
                    const jornada = { nombre: jornadaNombre, inicio: jornadaInicio, fin: jornadaFin };
                    jornadas.push(jornada);

                    const li = document.createElement('li');
                    li.textContent = `${jornadaNombre} (Inicio: ${jornadaInicio}, Fin: ${jornadaFin})`;

                    const removeButton = document.createElement('button');
                    removeButton.textContent = 'Eliminar';
                    removeButton.classList.add('text-red-500', 'ml-2', 'remove-jornada');
                    removeButton.addEventListener('click', () => {
                        jornadas = jornadas.filter(j => j.nombre !== jornadaNombre || j.inicio !== jornadaInicio || j.fin !== jornadaFin);
                        li.remove();
                        updateJornadasInput();
                    });

                    li.appendChild(removeButton);
                    jornadasList.appendChild(li);
                    jornadaNombreInput.value = '';
                    jornadaInicioInput.value = '';
                    jornadaFinInput.value = '';
                    updateJornadasInput();
                }
            });

            function updateEquiposInput() {
                equiposInputContainer.innerHTML = '';

                equipos.forEach(id => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'equipos[]';
                    input.value = id;
                    equiposInputContainer.appendChild(input);
                });
            }

            function updateJornadasInput() {
                jornadasInputContainer.innerHTML = '';

                jornadas.forEach(jornada => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'jornadas[]';
                    input.value = JSON.stringify(jornada);
                    jornadasInputContainer.appendChild(input);
                });
            }
        });
    </script>
</x-app-layout>