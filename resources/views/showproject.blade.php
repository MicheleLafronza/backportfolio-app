<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Titolo del progetto -') }} {{ $project->project_title }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center">
                <h3 class="p-6">Riassunto del progetto</h3>
                <div class="p-6 text-gray-900">
                    {{ $project->summary }}
                </div>
            </div>
            
            <div class="bg-white mt-3 overflow-hidden shadow-sm sm:rounded-lg text-center">
                <h3 class="p-6">Descrizione del progetto</h3>
                <div class="p-6 text-gray-900">
                    {{ $project->description }}
                </div>
            </div>

            <div class="bg-white mt-3 overflow-hidden shadow-sm sm:rounded-lg text-center">
                <h3 class="p-6">Immagini del progetto</h3>
                
                <div class="p-6 flex justify-center">

                    @if (isset($project->img1) || isset($project->img2) || isset($project->img2))
                        @if (isset($project->img1))
                            <img src="{{ asset('storage/' . $project->img1) }}" alt="immagine 1 del progetto">
                        @endif
                        @if (isset($project->img2))
                            <img src="{{ $project->img2 }}" alt="immagine 2 del progetto">
                        @endif 
                        @if (isset($project->img3))
                            <img src="{{ $project->img3 }}" alt="immagine 3 del progetto">
                        @endif  
                    @else
                        <div class="p-6 text-gray-900">
                            Non ci sono immagini per questo progetto.
                        </div>
                    @endif
                </div>
                
            </div>    

            
            
        </div>
    </div>




</x-app-layout>