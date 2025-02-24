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
                    @if (count($projects) > 0)
                        @foreach ($projects as $project)
                            <li class="flex justify-between items-center p-3 bg-gray-200 border border-gray-400 rounded-lg shadow-md flex-wrap">
                                <div class="text-sm md:text-base">
                                    <strong>{{ $project->project_title }}</strong> - {{ $project->summary }}
                                </div>
                                <div class="flex space-x-2 mt-2 md:mt-0">
                                    <!-- Dettagli -->
                                    <a href="{{ route('projects.show', $project) }}" class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 text-xs">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <!-- Modifica -->
                                    <a href="{{ route('projects.edit', $project) }}" class="bg-yellow-500 text-white p-2 rounded-full hover:bg-yellow-600 text-xs">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Elimina -->
                                    <form id="delete-project-{{ $project->id }}" 
                                        action="{{ route('projects.destroy', $project->id) }}"
                                        method="POST"
                                        style="display: inline"
                                        onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600 text-xs">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach 
                    @else
                        <li class="flex justify-between items-center p-3 bg-gray-200 border border-gray-400 rounded-lg shadow-md">
                            Non ci sono progetti
                        </li>     
                    @endif 
                </ol>
            </div>
        </div>
    </div>
</x-app-layout>
