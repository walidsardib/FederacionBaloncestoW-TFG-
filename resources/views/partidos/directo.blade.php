<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Partidos en Directo</h1>

        @if ($partidos->isEmpty())
            <p class="text-center text-gray-500">No hay partidos en directo o próximos a comenzar.</p>
        @else
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

                                <a href="{{ route('partidos.verDirecto', $partido->id) }}"
                                    class="text-blue-500 hover:underline">
                                    Ver directo
                                </a>

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
        @endif
    </div>
</x-app-layout>