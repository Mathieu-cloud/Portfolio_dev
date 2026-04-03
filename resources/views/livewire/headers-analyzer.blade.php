<div class="w-full max-w-md bg-[#111112] border border-white/10 rounded-sm p-8 space-y-6">
    <h2 class="text-xl font-semibold text-center text-white">Headers Security Analyzer</h2>

    {{-- Formulaire --}}
    <form wire:submit="analyze" class="space-y-3">
        <input
            type="url"
            wire:model="url"
            placeholder="https://example.com"
            class="w-full bg-[#252527] border border-white/10 rounded-sm px-4 py-3 text-white text-lg tracking-wider placeholder-white/30 focus:outline-none focus:border-white/30"
        >
        @error('url')
            <p class="text-red-400 text-xs">{{ $message }}</p>
        @enderror

        <button
            type="submit"
            class="w-full cursor-pointer bg-white/5 border border-white/10 rounded-sm px-4 py-3 hover:bg-white/10 transition-all text-white"
        >
            <span wire:loading.remove wire:target="analyze">Analyser</span>
            <span wire:loading wire:target="analyze" class="flex items-center justify-center gap-2">
                <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Analyse en cours...
            </span>
        </button>
    </form>

    {{-- Erreur --}}
    @if($error)
        <div class="bg-red-500/10 border border-red-500/30 rounded-sm px-4 py-3 text-red-400 text-sm">
            {{ $error }}
        </div>
    @endif

    {{-- Résultats --}}
    @if($analyzed && !$error)
        {{-- URL finale si redirection --}}
        @if($finalUrl && $finalUrl !== $url)
            <div class="bg-[#252527] border border-white/10 rounded-sm px-4 py-2 text-xs">
                <span class="text-white/40">Redirigé vers :</span>
                <span class="text-white/70 font-mono break-all">{{ $finalUrl }}</span>
            </div>
        @endif

        {{-- Score global --}}
        <div class="flex items-center justify-between bg-[#252527] border border-white/10 rounded-sm px-4 py-4">
            <div>
                <p class="text-white/50 text-sm">Score global</p>
                <p class="text-white text-lg font-semibold">{{ $score }}%</p>
            </div>
            <div class="text-4xl font-bold {{ match(true) {
                $score >= 80 => 'text-green-400',
                $score >= 60 => 'text-yellow-400',
                $score >= 40 => 'text-orange-400',
                default => 'text-red-400',
            } }}">
                {{ $grade }}
            </div>
        </div>

        {{-- Liste des en-têtes --}}
        <div class="space-y-2">
            @foreach($results as $header)
                <div class="bg-[#1a1a1c] border border-white/5 rounded-sm px-4 py-3">
                    {{-- Nom + statut --}}
                    <div class="flex items-center justify-between">
                        <span class="text-white text-sm font-mono">{{ $header['name'] }}</span>
                        @if($header['present'])
                            <span class="text-green-400 text-xs font-semibold px-2 py-0.5 bg-green-400/10 rounded-sm">PRÉSENT</span>
                        @else
                            <span class="text-red-400 text-xs font-semibold px-2 py-0.5 bg-red-400/10 rounded-sm">ABSENT</span>
                        @endif
                    </div>

                    {{-- Description --}}
                    <p class="text-white/40 text-xs mt-1">{{ $header['description'] }}</p>

                    {{-- Valeur si présent --}}
                    @if($header['present'])
                        <p class="text-white/60 text-xs mt-2 font-mono bg-[#252527] px-2 py-1 rounded-sm break-all">{{ $header['value'] }}</p>
                    @else
                        {{-- Recommandation si absent --}}
                        <p class="text-orange-300/70 text-xs mt-2">{{ $header['recommendation'] }}</p>
                    @endif
                </div>
            @endforeach
        </div>

        {{-- Résumé --}}
        <div class="text-center text-white/30 text-xs pt-2">
            {{ collect($results)->where('present', true)->count() }} / {{ count($results) }} en-têtes de sécurité détectés
        </div>
    @endif
</div>
