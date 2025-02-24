<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Benvenuto') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center">
                <div class="p-6 text-gray-900">
                    {{ __('Attualmente hai') }} {{ $totalProjects }} {{ __('progetti registrati.') }}
                </div>

                <div class="p-6 text-gray-900">
                    {{ __('Attualmente hai') }} {{ $totalMessages }} {{ __('messaggi ricevuti.') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
