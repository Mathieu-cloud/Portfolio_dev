<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($projets as $projet)
        <div class="bg-gray-800 border border-gray-700 rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <div class="h-48 overflow-hidden">
                @if($projet->image)
                    <img src="{{ asset($projet->image) }}" alt="{{ $projet->nom }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-700 flex items-center justify-center">
                        <span class="text-gray-500">Pas d'image</span>
                    </div>
                @endif
            </div>

            <div class="p-5">
                <h3 class="text-xl font-bold text-white mb-2">{{ $projet->nom }}</h3>
                <p class="text-gray-400 text-sm line-clamp-2 mb-4">
                    {{ $projet->description }}
                </p>

                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach($projet->technologies as $tech)
                        <span class="px-2 py-1 text-xs font-medium bg-indigo-900/50 text-indigo-300 rounded-md border border-indigo-800">
                            {{ $tech->nom }}
                        </span>
                    @endforeach
                </div>

                <div class="flex items-center justify-between mt-auto">
                    @if($projet->lien)
                        <a href="{{ $projet->lien }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 text-sm font-semibold flex items-center">
                            Voir le site
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    @endif

                    <div class="flex gap-2">
                        <button class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full p-12 text-center bg-gray-800 rounded-xl border border-dashed border-gray-600">
            <p class="text-gray-400">Aucun projet trouvé. Commencez par en créer un !</p>
        </div>
    @endforelse
</div>
</div>
