<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FederacionBaloncestoW') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <nav class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="w-40 h-30">

            <div class="hidden md:flex space-x-4">
                <a href="{{ route('equipos.index') }}"
                    class="text-gray-700 hover:text-orange-500 font-medium">Inicio</a>
                <a href="{{ route('ligas.index') }}"
                    class="text-gray-700 hover:text-orange-500 font-medium">Competiciones</a>
                <a href="{{ route('scouting.index') }}"
                    class="text-gray-700 hover:text-orange-500 font-medium">Scouting</a>
                <a href="{{ route('noticias.index') }}"
                    class="text-gray-700 hover:text-orange-500 font-medium">Noticias</a>
                <a href="{{ route('partidos.directo') }}"
                    class="text-gray-700 hover:text-orange-500 font-medium">Partidos
                    en
                    directo</a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{ route('profile.edit') }}" class="text-gray-700 font-medium">{{ Auth::user()->name }}</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                        Salir
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        {{ $slot }}
    </main>
</body>

</html>