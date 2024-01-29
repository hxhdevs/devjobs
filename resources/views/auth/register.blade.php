<x-guest-layout>
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    
    
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            
        </div>
        {{-- Rol --}}
        <div class="mt-4">
            <x-input-label for="rol" :value="__('Que tipo de cuenta deseas en DevJobs')" />

            <select
                id="rol"
                name="rol"
                class="rounded-md shadow-sm border-gray-300 focus-border-indigo-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50 w-full"
            >
            <option value="">-- Selecciona un rol -- </option>
            <option value="1">Developer - Obtener Empleo</option>
            <option value="2">Reclutador - Publicar empleo</option>
            </select>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('repetir contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            
        </div>

        {{-- <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

        </div> --}}
        <div class="flex justify-between my-3">
            <x-link
                :href="route('login')"
            >
                Iniciar sesion
            </x-link>
            
            <x-link
                :href="route('password.request')"
            >
                Olvidaste tu password
            </x-link>
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Crear cuenta') }}
        </x-primary-button>
    </form>
</x-guest-layout>
