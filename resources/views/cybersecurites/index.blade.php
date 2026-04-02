<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cybersécurité</title>
    @vite('resources/css/app.css')
    @vite('resources/js/generateur.js')
</head>

<body class="bg-[#0a0a0a] text-white">
    <nav class="sticky top-0 z-50 flex items-center px-6 py-4 border-b border-white/5">
        <a href="/" class="text-white/50 hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0
  011 1v4a1 1 0 01-1 1" />
            </svg>
        </a>
        <h1 class="flex-1 text-center text-2xl font-semibold">Cybersécurité</h1>
    </nav>

    <section id="generator" class="flex justify-start items-center min-h-[calc(100vh-4rem)] px-8">
        <div class="w-full max-w-md bg-[#111112] border border-white/10 rounded-sm p-8 space-y-6">
            <h2 class="text-xl font-semibold text-center text-white">Générateur de Mots de Passe</h2>

            <!-- Zone d'affichage du mot de passe + bouton copier -->
            <div class="space-y-3">
                <input type="text" id="password" readonly
                    class="w-full bg-[#252527] border border-white/10 rounded-sm px-4 py-3 text-white text-lg tracking-wider"
                    placeholder="••••••••••••••••">
                <div id="strength-meter" class="space-y-1 hidden">
                    <div class="w-full h-1.5 bg-white/10 rounded-full overflow-hidden">
                        <div id="strength-bar" class="h-full rounded-full transition-all duration-300"
                            style="width: 0%"></div>
                    </div>
                    <p id="strength-text" class="text-xs text-right"></p>
                </div>
                <div class="flex gap-2">
                    <button id="btn-copy"
                        class="flex-1 cursor-pointer bg-white/5 border border-white/10 rounded-sm px-4 py-2 hover:bg-white/10 transition-all">
                        Copier
                    </button>
                    <button id="btn-clear-clipboard"
                        class="flex-1 cursor-pointer bg-white/5 border border-white/10 rounded-sm px-4 py-2 hover:bg-white/10 transition-all">
                        Vider le clipboard
                    </button>
                </div>
            </div>

            <!-- Options -->
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <label for="length" class="">Longueur</label>
                    <div class="flex items-center gap-3">
                        <input class=" accent-white  cursor-pointer w-28" type="range" id="length" min="8"
                            max="64" value="18">
                        <span id="length-value" class="w-6 text-right tabular-nums">18</span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <label for="uppercase" class="">Majuscules (A-Z)</label>
                    <input class="accent-white cursor-pointer" type="checkbox" id="uppercase" checked>
                </div>
                <div class="flex items-center justify-between">
                    <label for="numbers" class="">Chiffres (0-9)</label>
                    <input class="accent-white cursor-pointer" type="checkbox" id="numbers" checked>
                </div>
                <div class="flex items-center justify-between">
                    <label for="symbols" class="">Symboles (!@#$...)</label>
                    <input class="accent-white cursor-pointer" type="checkbox" id="symbols" checked>
                </div>
            </div>

            <!-- Boutons -->
            <div class="flex gap-3 pt-2">
                <button id="btn-generate"
                    class="flex-1 cursor-pointer bg-white/5 border border-white/10  rounded-sm px-4 py-3 hover:bg-white/10 transition-all">
                    Générer
                </button>
                <button id="btn-reset"
                    class="flex-1 cursor-pointer bg-white/5 border border-white/10 rounded-sm px-4 py-3 hover:bg-white/10 transition-all">
                    Effacer
                </button>
            </div>
        </div>
    </section>
</body>

</html>
