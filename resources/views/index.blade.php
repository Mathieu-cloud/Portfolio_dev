<x-layouts.head-index />

<header>
    <x-portfolios.index-nav />
</header>

<main class="bg-background">

    {{-- Section hero --}}
    <x-portfolios.hero-animation />

    {{-- Section à propos --}}
    <section id="about"
        class="flex flex-col items-center justify-center min-h-screen scroll-mt-20 py-12 md:py-20 px-6">

        <x-portfolios.section-title> À propos </x-portfolios.section-title>

        <div class="max-w-3xl w-full mt-10 text-center">

            <div class="space-y-8 text-lg md:text-xl text-slate-300">
                <p class="text-blanc font-heading font-medium leading-relaxed">
                    Développeur web <span class="text-primary font-heading italic text-base md:text-lg">Full-Stack</span>
                    récemment diplômé, je souhaite participer à des projets concrets tout en continuant à apprendre.
                </p>

                <p class="text-blanc font-heading leading-relaxed">
                    À l'aise autant avec le <strong>backend</strong> que le <strong>frontend</strong>, j'aime structurer
                    des applications solides et créer des interfaces simples et efficaces. Curieux et rigoureux, je
                    prends plaisir à résoudre des problèmes techniques et à améliorer constamment mes compétences.
                </p>

                <div class="flex justify-center pt-6">
                    <div class="h-1 w-12 bg-primary/30 rounded-full"></div>
                </div>
            </div>

        </div>
    </section>

    {{-- Section compétences --}}
    <section id="skills"
        class="flex flex-col items-center justify-start min-h-screen scroll-mt-20 py-16 md:py-24 bg-[#242936]">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 w-full">

            <x-portfolios.section-title> Mes compétences </x-portfolios.section-title>

            <x-portfolios.skill />

        </div>
    </section>

    {{-- Section projets --}}
    <section id="projects" class="flex flex-col items-center justify-start  min-h-screen scroll-mt-20 py-12 md:py-20">

        <x-portfolios.section-title> Mes projets </x-portfolios.section-title>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <livewire:project-list :isAdmin="false" />
        </div>

    </section>

    {{-- Section contact --}}
    <section id="contact"
        class="flex flex-col items-center justify-start min-h-screen scroll-mt-20 py-16 md:py-24 relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-6 w-full relative z-10">

            <x-portfolios.section-title> Contact </x-portfolios.section-title>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <div class="relative group">
                    <livewire:contact-form />
                </div>

                <x-portfolios.contact-link />

            </div>
        </div>
    </section>
</main>
<footer>
   <x-portfolios.footer />
</footer>
</body>

</html>
