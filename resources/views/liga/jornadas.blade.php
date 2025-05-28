<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Generar Jornadas y Partidos</h1>
        <form action="{{ route('ligas.generarJornadas') }}" method="POST" class="bg-white shadow rounded p-4">
            @csrf
            <div class="mb-4">
                <label for="liga" class="block text-gray-700">Seleccionar Liga</label>
                <select id="liga" name="idLiga" class="form-select mt-1 block w-full" required>
                    <option value="" disabled selected>Seleccione una liga</option>
                    @foreach ($ligas as $liga)
                        <option value="{{ $liga->id }}">{{ $liga->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Generar</button>
        </form>
    </div>
</x-app-layout>