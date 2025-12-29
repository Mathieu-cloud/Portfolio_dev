{{-- Base : Bleu nuit — #0F172A
Accent 1 : Cyan — #22D3EE
Accent 2 : Gris clair — #E5E7EB --}}

<nav x-data="{
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
}" @scroll.window="spy()"
    class="fixed top-0 z-50 w-full bg-[#0f172a]/60 backdrop-blur-md border-b border-[#e5e7eb]/20">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">

            <div class="flex shrink-0 items-center">
                <a href="/"
                    class="text-xl font-bold text-white tracking-tighter hover:opacity-80 transition-opacity">
                    LOGO
                </a>
            </div>

            <div class="hidden sm:ml-6 sm:block">
                <div class="flex items-center space-x-1">

                    <a href="#hero" @click="activeSection = 'hero'"
                        :class="activeSection === 'hero' ? 'border-1 border-[#fff]' : 'border-2 border-transparent'"
                        class="rounded-md px-3 py-2 text-sm font-medium text-[#fff] hover:bg-[#22d3ee] hover:text-[#0f172a] transition-all focus-visible:outline-2 focus-visible:outline-white"
                        aria-current="page">
                        Accueil
                    </a>

                    <a href="#about" @click="activeSection = 'about'"
                        :class="activeSection === 'about' ? 'border-1 border-[#fff]' : 'border-2 border-transparent'"
                        class="rounded-md px-3 py-2 text-sm font-medium text-[#fff] hover:bg-[#22d3ee] hover:text-[#0f172a] transition-all focus-visible:outline-2 focus-visible:outline-white">À
                        Propos
                    </a>

                    <a href="#skills" @click="activeSection = 'skills'"
                        :class="activeSection === 'skills' ? 'border-1 border-[#fff]' : 'border-2 border-transparent'"
                        class="rounded-md px-3 py-2 text-sm font-medium text-[#fff] hover:bg-[#22d3ee] hover:text-[#0f172a] transition-all focus-visible:outline-2 focus-visible:outline-white">
                        Compétences
                    </a>

                    <a href="#projects"@click="activeSection = 'projects'"
                        :class="activeSection === 'projects' ? 'border-1 border-[#fff]' : 'border-2 border-transparent'"
                        class="rounded-md px-3 py-2 text-sm font-medium text-[#fff] hover:bg-[#22d3ee] hover:text-[#0f172a] transition-all focus-visible:outline-2 focus-visible:outline-white">
                        Projets
                    </a>
                    <a href="#contact"@click="activeSection = 'contact'"
                        :class="activeSection === 'contact' ? 'border-1 border-[#fff]' : 'border-2 border-transparent'"
                        class="rounded-md px-3 py-2 text-sm font-medium text-[#fff] hover:bg-[#22d3ee] hover:text-[#0f172a] transition-all focus-visible:outline-2 focus-visible:outline-white">
                        Contact
                    </a>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <button type="button" command="--toggle" commandfor="mobile-menu"
                    class="inline-flex sm:hidden items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/10 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white transition-colors">
                    <span class="sr-only">Menu principal</span>
                    <svg class="size-6 in-aria-expanded:hidden" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="size-6 not-in-aria-expanded:hidden" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="sm:hidden bg-black border-t border-white/10">
        <div class="flex flex-col items-center space-y-1 px-4 pt-2 pb-6">

            <a href="#hero" @click="activeSection = 'hero'"
                :class="activeSection === 'hero' ? 'border-1 border-[#fff]' : 'border-2 border-transparent'"
                class="w-fit rounded-md hover:bg-[#22d3ee] hover:text-[#0f172a] px-3 py-3 text-base font-medium text-center text-[#fff]" aria-current="page">
                Accueil
            </a>

            <a href="#about" @click="activeSection = 'about'"
                        :class="activeSection === 'about' ? 'border-1 border-[#fff]' : 'border-2 border-transparent'"
                class="w-fit rounded-md px-3 py-3 text-base font-medium text-center text-[#fff] hover:bg-[#22d3ee] hover:text-[#0f172a]">À
                Propos
            </a>

            <a href="#skills" @click="activeSection = 'skills'"
                        :class="activeSection === 'skills' ? 'border-1 border-[#fff]' : 'border-2 border-transparent'"
                class="w-fit rounded-md px-3 py-3 text-base font-medium text-center text-[#fff] hover:bg-[#22d3ee] hover:text-[#0f172a]">
                Compétences
            </a>

            <a href="#projects" @click="activeSection = 'projects'"
                        :class="activeSection === 'projects' ? 'border-1 border-[#fff]' : 'border-2 border-transparent'"
                class="w-fit rounded-md px-3 py-3 text-base font-medium text-center text-[#fff] hover:bg-[#22d3ee] hover:text-[#0f172a]">
                Projets
            </a>

            <a href="#contact" @click="activeSection = 'contact'"
                        :class="activeSection === 'contact' ? 'border-1 border-[#fff]' : 'border-2 border-transparent'"
                class="w-fit rounded-md px-3 py-3 text-base font-medium text-center text-[#fff] hover:bg-[#22d3ee] hover:text-[#0f172a]">
                Contact
            </a>
        </div>
    </el-disclosure>
</nav>
