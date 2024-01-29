<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b text-gray-900">
                    <h1 class="text-2xl font-bold text-center my-10">
                        Editar vacante: {{$vacante->titulo}}
                        {{-- Aqui se esta pasando el tutulo de la vacante mediante routing model binding
                            en la parte del componente de livewire tenemos que extenderlo al componente --}}
                    </h1>
                    <div class="md:flex md:justify-center p-3">
                        {{-- de este modo le estamos pasando informacion al componente que proviened e vacante y con los : le estamos diciendo que sera dinamico--}}
                        <livewire:editar-vacante :vacante="$vacante" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
