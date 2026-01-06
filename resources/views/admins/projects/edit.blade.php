<x-layouts.app :title="__('Modifier le projet')">
    <div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-lg">
        <div class="text-white">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white">Modifier : {{ $project->nom }}</h1>
                <p class="text-gray-400 mt-2">Mettez à jour les informations de votre réalisation.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-900/30 border-l-4 border-red-500 text-red-200">
                    <p class="font-bold mb-1">Veuillez corriger les erreurs suivantes :</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Changement de l'action vers UPDATE et ajout de @method('PUT') --}}
            <form action="{{ route('admins.projects.update', ['id' => $project->id]) }}" method="POST"
                enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                {{-- Nom du projet --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-300 mb-1">Nom du projet</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $project->nom) }}"
                        required
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                </div>
                {{-- Description --}}
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-300 mb-1">Description</label>
                    <textarea name="description" id="description" rows="4" required
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">{{ old('description', $project->description) }}</textarea>
                </div>
                {{-- Image --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-1">Image actuelle</label>
                    <div class="mb-3">
                        {{-- Affichage de l'image existante --}}
                        <img src="{{ asset($project->image) }}" alt="Aperçu"
                            class="w-32 h-32 object-cover rounded-lg border border-gray-600">
                    </div>

                    <label for="image" class="block text-sm font-semibold text-gray-300 mb-1">Changer l'image
                        (optionnel)</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-indigo-900 file:text-indigo-200 hover:file:bg-indigo-800 cursor-pointer">
                </div>
                {{-- Technologies --}}
                <div>
                    <label for="technologies" class="block text-sm font-semibold text-gray-300 mb-1">Technologies
                        utilisées</label>
                    <select name="technologies[]" id="technologies" multiple required
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                        @foreach ($technologies as $tech)
                            <option value="{{ $tech->id }}" {{-- On sélectionne les technos déjà associées --}}
                                @if (in_array($tech->id, old('technologies', $project->technologies->pluck('id')->toArray()))) selected @endif>
                                {{ $tech->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- Lien du projet --}}
                <div>
                    <label for="link" class="block text-sm font-semibold text-gray-300 mb-1">Lien du projet
                        (URL)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">https://</span>
                        </div>
                        <input type="url" name="link" id="link"
                            value="{{ old('link', str_replace('https://', '', $project->lien)) }}"
                            class="w-full pl-16 pr-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                            placeholder="example.com">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-indigo-900 hover:bg-indigo-800 text-indigo-200 font-bold py-3 px-4 rounded-lg shadow-md transition-all active:scale-[0.98]">
                        Mettre à jour le projet
                    </button>

                    <div class="mt-4 text-center">
                        <a href="{{ url()->previous() }}"
                            class="text-sm text-gray-400 hover:text-indigo-400 transition-colors">
                            Annuler et retourner
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
