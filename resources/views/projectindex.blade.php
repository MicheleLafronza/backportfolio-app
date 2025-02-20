<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Gestione progetti di') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <ol class="list-decimal space-y-4 text-gray-900 w-full">  
                    <li class="flex justify-between items-center p-3 bg-gray-200 border border-gray-400 rounded-lg shadow-md">
                        <span>Progetto 1</span>
                        <div class="space-x-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Dettagli</button>
                            <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Modifica</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Elimina</button>
                        </div>
                    </li>
                    <li class="flex justify-between items-center p-3 bg-gray-200 border border-gray-400 rounded-lg shadow-md">
                        <span>Progetto 2</span>
                        <div class="space-x-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Dettagli</button>
                            <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Modifica</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Elimina</button>
                        </div>
                    </li>
                    <li class="flex justify-between items-center p-3 bg-gray-200 border border-gray-400 rounded-lg shadow-md">
                        <span>Progetto 3</span>
                        <div class="space-x-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Dettagli</button>
                            <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Modifica</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Elimina</button>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    
    
</x-app-layout>