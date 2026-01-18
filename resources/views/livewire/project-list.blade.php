<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($projets as $projet)
            <div
                class="bg-gray-800 border border-gray-700 rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <div class="h-48 overflow-hidden">
                    {{-- Image --}}
                    @if ($projet->image)
                        <img src="{{ asset($projet->image) }}" alt="{{ $projet->nom }}"
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-700 flex items-center justify-center">
                            <span class="text-gray-500">Pas d'image</span>
                        </div>
                    @endif
                </div>
                {{-- Nom et description du projet --}}
                <div class="p-5">
                    <h3 class="text-xl font-bold text-white mb-2">{{ $projet->nom }}</h3>
                    <p class="text-gray-400 text-sm line-clamp-2 mb-4">
                        {{ $projet->description }}
                    </p>

                    {{-- Technologies utilisées --}}
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach ($projet->technologies as $tech)
                            <span
                                class="px-2 py-1 text-xs font-medium bg-indigo-900/50 text-indigo-300 rounded-md border border-indigo-800">
                                {{ $tech->nom }}
                            </span>
                        @endforeach
                    </div>

                    {{-- Lien vers site du projet et Edit --}}
                    <div class="flex items-center justify-between mt-auto">
                        @if ($projet->lien)
                            <a href="{{ $projet->lien }}" target="_blank"
                                class="text-indigo-400 hover:text-indigo-300 text-sm font-semibold flex items-center">
                                Voir le site
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                    </path>
                                </svg>
                            </a>
                        @endif

                        {{-- CONDITION POUR L'ADMINISTRATION --}}
                        @if ($isAdmin ?? false)
                            <a href="{{ route('admins.projects.edit', $projet) }}"
                                class="text-gray-400 hover:text-yellow-500 text-sm font-semibold flex items-center transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Modifier
                            </a>
                        @endif
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
