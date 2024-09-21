<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div>
                    <div class="container mx-auto">
                        <a href="{{ route('categorias') }}" class="block w-full bg-blue-600 text-black uppercase rounded hover:bg-blue-500 py-2 text-center">
                            Ir a Categorías
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
