<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
    <title>Créer un projet</title>
</head>

<body class="bg-gray-50 font-sans antialiased text-gray-900">

    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-2xl bg-white rounded-xl shadow-lg p-8">

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">🚀 Créer un nouveau projet</h1>
                <p class="text-gray-500 mt-2">Partagez vos réalisations avec le monde.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                    <p class="font-bold mb-1">Veuillez corriger les erreurs suivantes :</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nom du projet</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="Mon super portfolio">
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                    <textarea name="description" id="description" rows="4" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="Décrivez brièvement les objectifs et technologies utilisées...">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">Image d'illustration</label>
                    <input type="file" name="image" id="image" accept="image/*" required
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                </div>

                <div>
                    <label for="link" class="block text-sm font-semibold text-gray-700 mb-1">Lien du projet (URL)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-400 sm:text-sm">https://</span>
                        </div>
                        <input type="url" name="link" id="link" value="{{ old('link') }}"
                            class="w-full pl-16 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                            placeholder="example.com">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transform transition-transform active:scale-[0.98]">
                        Enregistrer le projet
                    </button>

                    <div class="mt-4 text-center">
                        <a href="{{ url()->previous() }}" class="text-sm text-gray-500 hover:text-indigo-600 transition-colors">
                            Annuler et retourner
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>

</body>

</html>
