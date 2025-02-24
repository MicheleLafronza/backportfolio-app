<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Email -') }} {{ $message->email }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-3 overflow-hidden shadow-sm sm:rounded-lg text-center">
                <h3 class="p-6">Messaggio:</h3>
                <div class="p-6 text-gray-900">
                    {{ $message->message }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>