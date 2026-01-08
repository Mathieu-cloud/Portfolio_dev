<div class="w-full">
    <form wire:submit="sendToGmail"
        class="bg-white/5 backdrop-blur-sm p-6 md:p-10 rounded-3xl border border-white/10 shadow-2xl space-y-6">

        @if (session()->has('success'))
            <div
                class="bg-green-500/20 border border-green-500/50 text-green-400 p-4 rounded-xl text-sm flex items-center animate-pulse">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 gap-6">
            <div class="relative group">
                <label class="block text-xs font-semibold text-lime-400 uppercase tracking-widest mb-2 ml-1">Nom
                    Complet</label>
                <input type="text" wire:model="name" placeholder="Prénom Nom"
                    class="w-full bg-[#1a1f2b]/50 border border-white/10 rounded-xl px-4 py-4 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-lime-500/50 focus:border-lime-500 transition-all duration-300">
            </div>

            <div class="relative group">
                <label
                    class="block text-xs font-semibold text-lime-400 uppercase tracking-widest mb-2 ml-1">Email</label>
                <input type="email" wire:model="email" placeholder="prenom.nom@exemple.com"
                    class="w-full bg-[#1a1f2b]/50 border border-white/10 rounded-xl px-4 py-4 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-lime-500/50 focus:border-lime-500 transition-all duration-300">
            </div>

            <div class="relative group">
                <label
                    class="block text-xs font-semibold text-lime-400 uppercase tracking-widest mb-2 ml-1">Message</label>
                <textarea wire:model="message" rows="5" placeholder="Votre message ici..."
                    class="w-full bg-[#1a1f2b]/50 border border-white/10 rounded-xl px-4 py-4 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-lime-500/50 focus:border-lime-500 transition-all duration-300 resize-none"></textarea>
            </div>
        </div>

        <button type="submit" wire:loading.attr="disabled"
            class="w-full group relative flex items-center justify-center bg-gradient-to-r from-lime-500 to-green-600 hover:from-lime-400 hover:to-green-500 text-[#2e3445] font-black py-4 rounded-xl transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-xl">

            <div wire:loading.remove class="flex items-center uppercase tracking-tighter">
                <span>Envoyer le message</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </div>

            <div wire:loading class="flex items-center">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-[#2e3445]" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span>Envoi en cours...</span>
            </div>
        </button>
    </form>
</div>
