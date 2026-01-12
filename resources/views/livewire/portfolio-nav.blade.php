<nav x-data="{
    open: false,
    activeSection: 'hero',
    spy() {
        const sections = ['hero', 'about', 'skills', 'projects', 'contact'];
        for (const id of sections) {
            const el = document.getElementById(id);
            if (el && window.scrollY >= (el.offsetTop - 100)) {
                this.activeSection = id;
            }
        }
    }
}" @scroll.window="spy()" class="fixed top-0 z-50 w-full bg-background/60 backdrop-blur-md">

    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            {{-- Icon --}}
            <div class="flex shrink-0 items-center">
                <a href="/" class="text-xl font-bold text-white tracking-tighter hover:opacity-80 transition-opacity">
                    Avatar
                </a>
            </div>

            <div class="hidden sm:ml-6 sm:block">
                <div class="flex items-center space-x-1">
                    <template x-for="item in [
                        {id: 'hero', label: 'Accueil'},
                        {id: 'about', label: 'À Propos'},
                        {id: 'skills', label: 'Compétences'},
                        {id: 'projects', label: 'Projets'},
                        {id: 'contact', label: 'Contact'}
                    ]">
                        <a :href="'#' + item.id"
                           @click="activeSection = item.id"
                           :class="activeSection === item.id ? 'border-b-2 border-white' : 'border-b-2 border-transparent'"
                           class="px-3 py-2 font-heading text-blanc hover:text-[#22d3ee] transition-all"
                           x-text="item.label">
                        </a>
                    </template>
                </div>
            </div>

            <div class="flex items-center gap-2 sm:hidden">
                <button type="button" @click="open = !open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/10 hover:text-white focus:outline-none transition-colors">
                    <span class="sr-only">Menu principal</span>
                    <svg x-show="!open" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="open" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         @click.away="open = false"
         class="sm:hidden bg-[#222733]/60 border-t border-white/10">
        <div class="flex flex-col items-center space-y-1 px-4 pt-2 pb-6 font-heading">

            <a href="#hero" @click="open = false; activeSection = 'hero'"
                :class="activeSection === 'hero' ? ' text-[#22d3ee]' : 'text-blanc'"
                class="block w-full px-3 py-3 text-center transition-colors">
                Accueil
            </a>

            <a href="#about" @click="open = false; activeSection = 'about'"
                :class="activeSection === 'about' ? ' text-[#22d3ee]' : 'text-blanc'"
                class="block w-full px-3 py-3 text-center transition-colors">
                À Propos
            </a>

            <a href="#skills" @click="open = false; activeSection = 'skills'"
                :class="activeSection === 'skills' ? ' text-[#22d3ee]' : 'text-blanc'"
                class="block w-full px-3 py-3 text-center transition-colors">
                Compétences
            </a>

            <a href="#projects" @click="open = false; activeSection = 'projects'"
                :class="activeSection === 'projects' ? ' text-[#22d3ee]' : 'text-blanc'"
                class="block w-full px-3 py-3 text-center transition-colors">
                Projets
            </a>

            <a href="#contact" @click="open = false; activeSection = 'contact'"
                :class="activeSection === 'contact' ? ' text-[#22d3ee]' : 'text-blanc'"
                class="block w-full px-3 py-3 text-center transition-colors">
                Contact
            </a>
        </div>
    </div>
</nav>

