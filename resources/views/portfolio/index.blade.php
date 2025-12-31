{{-- sm	40rem (640px)	@media (width >= 40rem) { ... }
md	48rem (768px)	@media (width >= 48rem) { ... }
lg	64rem (1024px)	@media (width >= 64rem) { ... }
xl	80rem (1280px)	@media (width >= 80rem) { ... }
2xl	96rem (1536px)	@media (width >= 96rem) { ... } --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
    <title>Portfolio</title>
</head>

<body class="antialiased text-gray-200">
    <header>
        < x-portfolio.navbar />
    </header>

    <main class="bg-[#2e3445]">
        <div class="relative">
            <div id="hero" class="relative -top-24"></div>
            <section class="flex flex-col items-center justify-start pt-30">
                <div class="relative z-10 text-center">
                    <h1
                        class="pt-15 text-[3.25rem] sm:text-[6rem] leading-[1.1] text-[#dbe6cb] font-light flex flex-col">
                        <span>Mathieu</span>
                        <span>Moreau</span>
                    </h1>
                    <p class="text-[1.875rem] sm:text-[2.25rem] mt-4 text-[#fff] flex flex-col sm:block">
                        <span>DÉVELOPPEUR WEB FULL-STACK</span>
                    </p>
                </div>
            </section>
        </div>

        <section id="about" class="flex flex-col items-center justify-start overflow-hidden scroll-mt-80 pt-20">
            <h2 class="">
                À propos
            </h2>
        </section>

        <section id="skills"
            class="flex flex-col items-center justify-start overflow-hidden scroll-mt-20 py-12 md:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">

                <div class="text-center mb-10 md:mb-16">
                    <h2 class="text-4xl sm:text-5xl md:text-7xl mb-6 font-bold">
                        COMPÉTENCES
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">

                    <div
                        class="bg-gradient-to-br from-cyan-500 to-blue-600 p-6 md:p-8 shadow-2xl transform transition-all hover:scale-105 border-2 border-white/30 rounded-xl">
                        <div class="flex justify-center mb-4">
                            <x-icons.front-end class="w-12 h-12 text-black" />
                        </div>
                        <h3
                            class="text-2xl md:text-3xl mb-6 text-white text-center font-black uppercase tracking-tight">
                            Frontend</h3>
                        <div class="space-y-4">

                            <img class="w-12 h-12"
                                src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/html5/html5-original-wordmark.svg" />

                        </div>
                    </div>

                    <div
                        class="bg-gradient-to-br from-fuchsia-500 to-purple-600 p-6 md:p-8 shadow-2xl transform transition-all hover:scale-105 border-2 border-white/30 rounded-xl">
                        <div class="flex justify-center mb-4">
                            <x-icons.back-end class="w-12 h-12 text-black" />
                        </div>
                        <h3
                            class="text-2xl md:text-3xl mb-6 text-white text-center font-black uppercase tracking-tight">
                            Backend</h3>
                        <div class="space-y-4">
                            <ul class="text-white/90 text-center font-medium">
                                <li>Node.js</li>
                                <li>PostgreSQL</li>
                                <li>API REST</li>
                            </ul>
                        </div>
                    </div>

                    <div
                        class="bg-gradient-to-br from-lime-500 to-green-600 p-6 md:p-8 shadow-2xl transform transition-all hover:scale-105 border-2 border-white/30 rounded-xl">
                        <div class="flex justify-center mb-4">
                            <x-icons.tools class="w-12 h-12 text-black" />
                        </div>
                        <h3
                            class="text-2xl md:text-3xl mb-6 text-white text-center font-black uppercase tracking-tight">
                            Technologies</h3>
                        <div class="space-y-4">
                            <ul class="text-white/90 text-center font-medium">
                                <li>Git / GitHub</li>
                                <li>Docker</li>
                                <li>Figma</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="projects" class="flex flex-col items-center justify-start overflow-hidden scroll-mt-80 pt-20">
            <h2 class="">
                PROJETS
            </h2>
        </section>
        <section id="contact" class="flex flex-col items-center justify-start overflow-hidden scroll-mt-80 pt-20">
            <h2 class="">
                CONTACTEZ-MOI
            </h2>
        </section>
    </main>
</body>

</html>
