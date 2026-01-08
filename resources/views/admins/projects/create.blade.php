<x-layouts.app :title="__('Créer un projet')">
    <div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-lg">
        <div class="text-white">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white">Ajouter un nouveau projet</h1>
                <p class="text-gray-400 mt-2">Partagez vos réalisations avec le monde.</p>
            </div>
            {{-- Messages d'erreur --}}
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
            {{-- Formulaire de création de projet --}}
            <form action="{{ route('admins.projects.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                {{-- Nom du projet --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-300 mb-1">Nom du projet</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="Mon super portfolio">
                </div>
                {{-- Description du projet --}}
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-300 mb-1">Description</label>
                    <textarea name="description" id="description" rows="4" required
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="Décrivez brièvement les objectifs et technologies utilisées...">{{ old('description') }}</textarea>
                </div>
                {{-- Image du projet --}}
                <div>
                    <label for="image" class="block text-sm font-semibold text-gray-300 mb-1">Image
                        du projet</label>
                    <input type="file" name="image" id="image" accept="image/*" required
                        class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-900 file:text-indigo-200 hover:file:bg-indigo-800 cursor-pointer">
                </div>
                {{-- Technologies utilisées --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-3">
                        Technologies utilisées
                    </label>

                    <div
                        class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4 bg-gray-800 border border-gray-600 rounded-lg">
                        @foreach ($technologies as $tech)
                            <div class="flex items-center">
                                <input type="checkbox" name="technologies[]" id="tech-{{ $tech->id }}"
                                    value="{{ $tech->id }}"
                                    class="w-4 h-4 text-indigo-600 bg-gray-700 border-gray-500 rounded focus:ring-indigo-500 focus:ring-2 transition-all cursor-pointer">

                                <label for="tech-{{ $tech->id }}"
                                    class="ml-2 text-sm text-gray-300 cursor-pointer hover:text-white transition-colors">
                                    {{ $tech->nom }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    @error('technologies')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Lien du projet --}}
                <div>
                    <label for="link" class="block text-sm font-semibold text-gray-300 mb-1">Lien du projet
                        (URL)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">https://</span>
                        </div>
                        <input type="url" name="link" id="link" value="{{ old('link') }}"
                            class="w-full pl-16 pr-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                            placeholder="example.com">
                    </div>
                </div>
                {{-- Bouton de soumission --}}
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-indigo-900 hover:bg-indigo-800 text-indigo-200 font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-indigo-500/20 transform transition-transform active:scale-[0.98]">
                        Enregistrer le projet
                    </button>
                    {{-- Bouton Annuler --}}
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
