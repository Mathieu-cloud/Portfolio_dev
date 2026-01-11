<div class="w-full">
    <form wire:submit="sendToGmail"
        class=" p-8 md:p-12 space-y-8">

        @if (session()->has('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                class=" p-4  text-sm flex items-center transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="space-y-6">
            <div class="relative group">
                <input type="text" wire:model="name" placeholder="Nom"
                    class="w-full bg-white/5 border border-white/10  px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-lime-500/30 focus:border-lime-500 transition-all duration-300 group-hover:border-white/20">
                @error('name') <span class="text-red-400 text-xs mt-1 ml-2">{{ $message }}</span> @enderror
            </div>

            <div class="relative group">
                <input type="email" wire:model="email" placeholder="Courriel"
                    class="w-full bg-white/5 border border-white/10  px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-lime-500/30 focus:border-lime-500 transition-all duration-300 group-hover:border-white/20">
                @error('email') <span class="text-red-400 text-xs mt-1 ml-2">{{ $message }}</span> @enderror
            </div>

            <div class="relative group">
                <textarea wire:model="message" rows="5" placeholder="Message"
                    class="w-full bg-white/5 border border-white/10  px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-lime-500/30 focus:border-lime-500 transition-all duration-300 resize-none group-hover:border-white/20"></textarea>
                @error('message') <span class="text-red-400 text-xs mt-1 ml-2">{{ $message }}</span> @enderror
            </div>
        </div>

        <button type="submit" wire:loading.attr="disabled"
            class="w-full group relative flex items-center justify-center bg-white text-[#242936] font-bold py-5  transition-all duration-300 transform hover:scale-[1.01] active:scale-[0.98]">

            <div wire:loading.remove class="flex items-center uppercase tracking-widest text-sm">
                <span>Envoyer</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </div>

            <div wire:loading class="flex items-center uppercase tracking-widest text-sm">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-[#242936]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Traitement...</span>
            </div>
        </button>
    </form>
</div>
