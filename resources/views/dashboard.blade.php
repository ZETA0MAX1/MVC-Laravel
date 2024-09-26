<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <p class="text-red-500">Bienvenido a la página de categorías.</p>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- CUADRADO BLANCO -->

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                <div class="container mx-auto">
                    <a href="{{ route('categorias') }}" class="block text-blue-500 uppercase rounded py-2 text-center">
                        Ir a Categorías
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
