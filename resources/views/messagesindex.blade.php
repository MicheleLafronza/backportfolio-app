<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Elenco messaggi di') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <ol class="list-decimal space-y-4 text-gray-900 w-full">
                    @if (count($messages) > 0)
                        @foreach ($messages as $message)
                            <li class="flex justify-between items-center p-3 bg-gray-200 border border-gray-400 rounded-lg shadow-md flex-wrap">
                                <div class="text-sm md:text-base">
                                    <strong>{{ $message->email}}</strong> - {{ $message->message }}
                                </div>
                                <div class="flex space-x-2 mt-2 md:mt-0">
                                    <!-- Dettagli -->
                                    <a href="{{ route('message.show', $message->id) }}" class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 text-xs">
                                        <i class="fas fa-info-circle"></i>
                                    </a>                                  
                                </div>
                            </li>
                        @endforeach 
                    @else
                        <li class="flex justify-between items-center p-3 bg-gray-200 border border-gray-400 rounded-lg shadow-md">
                            Non ci sono messaggi
                        </li>     
                    @endif 
                </ol>
            </div>
        </div>
    </div>
</x-app-layout>