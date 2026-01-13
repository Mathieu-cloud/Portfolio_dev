<x-layouts.head-index />

<header>
    <livewire:portfolio-nav />
</header>

<main class="bg-background">

    {{-- Section hero --}}
    <livewire:hero-animation />

    {{-- Section à propos --}}
    <section id="about" class="flex flex-col items-center justify-start  min-h-screen scroll-mt-20 py-12 md:py-20">

        <x-section-title> À propos </x-section-title>

    </section>

    {{-- Section compétences --}}
    <section id="skills"
        class="flex flex-col items-center justify-start min-h-screen scroll-mt-20 py-16 md:py-24 bg-[#242936]">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 w-full">

            <x-section-title> Mes compétences </x-section-title>

            <livewire:skills />

        </div>
    </section>

    {{-- Section projets --}}
    <section id="projects" class="flex flex-col items-center justify-start  min-h-screen scroll-mt-20 py-12 md:py-20">

        <x-section-title> Mes projets </x-section-title>

        <livewire:project-list />

    </section>

    {{-- Section contact --}}
    <section id="contact"
        class="flex flex-col items-center justify-start min-h-screen scroll-mt-20 py-16 md:py-24 relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-6 w-full relative z-10">

            <x-section-title> Contact </x-section-title>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <div class="relative group">
                    <livewire:contact-form />
                </div>

                <livewire:contact-link />

            </div>
        </div>
    </section>

</main>
</body>

</html>
