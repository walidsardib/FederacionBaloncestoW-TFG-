<!-- filepath: c:\Users\Memorandum\Desktop\tfgLaravel\tfgWalidSardi\resources\views\auth\login.blade.php -->
<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recuérdame') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}">
                {{ __('¿Olvidaste tu contraseña?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Iniciar Sesión') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Enlace para crear cuenta -->
    <div class="mt-4 text-center">
        <p class="text-gray-700 dark:text-gray-400">{{ __('¿No tienes una cuenta?') }}</p>
        <a href="{{ route('register') }}" class="text-blue-500 hover:underline me-4">{{ __('Crear una cuenta') }}</a>
        <a href="{{ route('equipos.index') }}" class="text-blue-500 hover:underline ">{{ __('Continuar como invitado') }}</a>
    </div>
</x-guest-layout>