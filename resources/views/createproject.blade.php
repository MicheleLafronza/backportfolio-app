<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Gestione progetti di') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="list-disc list-inside text-center">
          @foreach ($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-12 p-8">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Nuovo Progetto</h2>
            <p class="mt-1 text-sm/6 text-gray-600">Inserisci i dettagli del nuovo progetto.</p>
      
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <label for="project_title" class="block text-sm/6 font-medium text-gray-900">Titolo</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input type="text" name="project_title" id="project_title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="titolo">
                  </div>
                </div>
              </div>
      
              <div class="col-span-full">
                <label for="summary" class="block text-sm/6 font-medium text-gray-900">Riassunto progetto</label>
                <div class="mt-2">
                    <div class="flex items-center rounded-md outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                        <input type="text" name="summary" id="summary" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="piccolo riassunto">
                    </div>
                </div>
              </div>

              <div class="col-span-full">
                <label for="description" class="block text-sm/6 font-medium text-gray-900">Descrizione</label>
                <div class="mt-2">
                  <textarea name="description" id="description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                </div>
                <p class="mt-3 text-sm/6 text-gray-600">Scrivi una descrizione dettagliata del progetto.</p>
              </div>

              <div class="flex flex-wrap gap-4">
                <!-- Campo Upload 1 -->
                <div class="flex flex-col items-center">
                    <label for="img1" class="block text-sm font-medium text-gray-900 mb-2">Immagine 1 *</label>
                    <div class="relative flex items-center justify-center w-32 h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500">
                        <input id="img1" name="img1" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="updateFileName(this, 'file-name-1')">
                        <span class="text-sm text-gray-500" id="file-name-1">Scegli file</span>
                    </div>
                </div>
            
                <!-- Campo Upload 2 -->
                <div class="flex flex-col items-center">
                    <label for="img2" class="block text-sm font-medium text-gray-900 mb-2">Immagine 2</label>
                    <div class="relative flex items-center justify-center w-32 h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500">
                        <input id="img2" name="img2" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="updateFileName(this, 'file-name-2')">
                        <span class="text-sm text-gray-500" id="file-name-2">Scegli file</span>
                    </div>
                </div>
            
                <!-- Campo Upload 3 -->
                <div class="flex flex-col items-center">
                    <label for="img3" class="block text-sm font-medium text-gray-900 mb-2">Immagine 3</label>
                    <div class="relative flex items-center justify-center w-32 h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500">
                        <input id="img3" name="img3" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="updateFileName(this, 'file-name-3')">
                        <span class="text-sm text-gray-500" id="file-name-3">Scegli file</span>
                    </div>
                </div>
            </div>
            
            <script>
                function updateFileName(input, labelId) {
                    const fileName = input.files.length > 0 ? input.files[0].name : "Scegli file";
                    document.getElementById(labelId).textContent = fileName;
                }
            </script>
            
            
            <script>
                function updateFileName(input, labelId) {
                    const fileName = input.files.length > 0 ? input.files[0].name : "Scegli file";
                    document.getElementById(labelId).textContent = fileName;
                }
            </script>
            
            </div>
          </div>
        </div>
        
      
        <div class="mt-6 pr-9 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
      
    
</x-app-layout>
