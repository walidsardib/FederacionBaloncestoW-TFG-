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
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center py-4">

            <img src="{{ asset('logo.png') }}" alt="Logo" class="w-40 h-30">

            <!-- Menú principal escritorio -->
            <div class="hidden md:flex space-x-4" id="menuPrincipal">
                <a href="{{ route('index') }}" class="text-gray-700 hover:text-orange-500 font-medium">Inicio</a>
                <a href="{{ route('ligas.index') }}" class="text-gray-700 hover:text-orange-500 font-medium">Competiciones</a>
                <a href="{{ route('scouting.index') }}" class="text-gray-700 hover:text-orange-500 font-medium">Scouting</a>
                <a href="{{ route('noticias.index') }}" class="text-gray-700 hover:text-orange-500 font-medium">Noticias</a>
                <a href="{{ route('partidos.directo') }}" class="text-gray-700 hover:text-orange-500 font-medium">Partidos en directo</a>
            </div>

            <!-- Botón hamburguesa móvil -->
            <div class="md:hidden flex items-center">
                <button id="btnMenuMovil" class="text-gray-700 focus:outline-none">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
            </div>

            @auth
            <div class="flex items-center space-x-4">

                <!-- WRAPPER DEL DROPDOWN -->
                <div class="relative group">

                    <a class="text-gray-700 font-medium cursor-pointer">
                        {{ Auth::user()->name }}
                    </a>

                    <ul
                        class="absolute left-1/2 -translate-x-1/2 mt-2 bg-white shadow-lg rounded-md py-2 w-40 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <li>
                            <a href="{{route('equipos.index')}}" class="block px-4 py-2 hover:bg-gray-100 text-center">Mi equipo</a>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100 text-center">Editar perfil</a>
                        </li>
                    </ul>

                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                        Salir
                    </button>
                </form>

            </div>
            @endauth

            @guest
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}">Iniciar Sesión</a>
            </div>
            @endguest

        </div>
    </nav>

    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        {{ $slot }}
    </main>
</body>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // Dropdown perfil (existente)
    const btn = document.getElementById("perfilBtn");
    const menuPerfil = document.getElementById("submenuPerfil");
    const wrapper = document.getElementById("perfilWrapper");

    if(btn) {
        btn.addEventListener("click", () => {
            menuPerfil.classList.toggle("hidden");
        });

        document.addEventListener("click", (e) => {
            if (!wrapper.contains(e.target)) {
                menuPerfil.classList.add("hidden");
            }
        });
    }

    // Menú móvil
    const btnMovil = document.getElementById("btnMenuMovil");
    const menu = document.getElementById("menuPrincipal");

    btnMovil.addEventListener("click", () => {
        menu.classList.toggle("hidden");
        menu.classList.toggle("flex");
        menu.classList.toggle("flex-col"); // Vertical en móvil
        menu.classList.toggle("space-x-0"); // Quitar espacio horizontal en móvil
        menu.classList.toggle("space-y-2"); // Añadir espacio vertical en móvil
    });
});
</script>

</html>
