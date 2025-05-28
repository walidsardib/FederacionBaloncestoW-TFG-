<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Crear Liga</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('ligas.store') }}" method="POST" class="bg-white shadow rounded p-4">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700">Nombre de la Liga</label>
                <input type="text" name="nombre" id="nombre" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="temporada" class="block text-gray-700">Temporada</label>
                <input type="text" name="temporada" id="temporada" class="form-input mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="equipos" class="block text-gray-700">Equipos</label>
                <select id="equipos" class="form-input mt-1 block w-full">
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
                <button type="button" id="add-equipo" class="bg-green-500 text-white px-4 py-2 rounded mt-2">Añadir
                    Equipo</button>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-bold mb-2">Equipos Seleccionados</h3>
                <ul id="equipos-seleccionados" class="list-disc pl-5"></ul>
            </div>
            <div id="equipos-input-container"></div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const equiposSelect = document.getElementById('equipos');
            const addEquipoButton = document.getElementById('add-equipo');
            const equiposSeleccionados = document.getElementById('equipos-seleccionados');
            const equiposInputContainer = document.getElementById('equipos-input-container');

            let equipos = [];

            addEquipoButton.addEventListener('click', () => {
                const equipoId = parseInt(equiposSelect.value);
                const equipoNombre = equiposSelect.options[equiposSelect.selectedIndex].text;

                if (!equipos.includes(equipoId)) {
                    equipos.push(equipoId);

                    const li = document.createElement('li');
                    li.textContent = equipoNombre;

                    const removeButton = document.createElement('button');
                    removeButton.textContent = 'Eliminar';
                    removeButton.classList.add('text-red-500', 'ml-2');
                    removeButton.addEventListener('click', () => {
                        equipos = equipos.filter(id => id !== equipoId);
                        li.remove();
                        updateEquiposInput();

                        const option = document.createElement('option');
                        option.value = equipoId;
                        option.textContent = equipoNombre;
                        equiposSelect.appendChild(option);
                    });

                    li.appendChild(removeButton);
                    equiposSeleccionados.appendChild(li);

                    equiposSelect.options[equiposSelect.selectedIndex].remove();

                    updateEquiposInput();
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
        });
    </script>
</x-app-layout>