<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
    <title>Portfolio</title>
</head>

<body>
    <header>
        <livewire:portfolio-nav />
    </header>

    <main class="bg-background">

        {{-- Section hero --}}
        <livewire:hero-animation />

        {{-- Section à propos --}}
        <section id="about"
            class="flex flex-col items-center justify-start  min-h-screen scroll-mt-20 py-12 md:py-20">

            <x-section-title> À propos </x-section-title>

        </section>

        {{-- Section compétences --}}
        <section id="skills"
            class="flex flex-col items-center justify-start min-h-screen scroll-mt-20 py-16 md:py-24 bg-[#242936]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 w-full">

                <x-section-title> Mes compétences </x-section-title>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <div
                        class="group relative bg-white/5 backdrop-blur-sm p-8 rounded-xl border border-white/10 transition-all duration-500 hover:-translate-y-2 hover:border-blue-500/50 hover:shadow-[0_20px_40px_-15px_rgba(59,130,246,0.3)]">
                        <div class="flex flex-col items-center">
                            <div
                                class="p-4 bg-blue-500/10 rounded-xl mb-6 group-hover:scale-110 transition-transform duration-500">
                                <x-icons.front-end class="w-12 h-12 text-blue-400" />
                            </div>
                            <x-card-title>Front-end</x-card-title>

                            <div class="flex flex-wrap justify-center gap-5">
                                <i class="devicon-html5-plain text-4xl text-gray-400 hover:text-[#E34F26] transition-colors duration-300"
                                    title="HTML5"></i>
                                <i class="devicon-css3-plain text-4xl text-gray-400 hover:text-[#1572B6] transition-colors duration-300"
                                    title="CSS3"></i>
                                <i class="devicon-sass-original text-4xl text-gray-400 hover:text-[#CC6699] transition-colors duration-300"
                                    title="Sass"></i>
                                <i class="devicon-tailwindcss-original text-4xl text-gray-400 hover:text-[#06B6D4] transition-colors duration-300"
                                    title="Tailwind CSS"></i>
                                <i class="devicon-javascript-plain text-4xl text-gray-400 hover:text-[#F7DF1E] transition-colors duration-300"
                                    title="JavaScript"></i>
                                <i class="devicon-vuejs-plain text-4xl text-gray-400 hover:text-[#4FC08D] transition-colors duration-300"
                                    title="Vue.js"></i>
                                <i class="devicon-alpinejs-original text-4xl text-gray-400 hover:text-[#8BC0D0] transition-colors duration-300"
                                    title="Alpine.js"></i>
                                <i class="devicon-jquery-plain text-4xl text-gray-400 hover:text-[#0769AD] transition-colors duration-300"
                                    title="jQuery"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="group relative bg-white/5 backdrop-blur-sm p-8 rounded-xl border border-white/10 transition-all duration-500 hover:-translate-y-2 hover:border-purple-500/50 hover:shadow-[0_20px_40px_-15px_rgba(168,85,247,0.3)]">
                        <div class="flex flex-col items-center">
                            <div
                                class="p-4 bg-purple-500/10 rounded-xl mb-6 group-hover:scale-110 transition-transform duration-500">
                                <x-icons.back-end class="w-12 h-12 text-purple-400" />
                            </div>
                            <x-card-title>Back-end</x-card-title>

                            <div class="flex flex-wrap justify-center gap-5">
                                <i class="devicon-php-plain text-4xl text-gray-400 hover:text-[#777BB4] transition-colors duration-300"
                                    title="PHP"></i>
                                <i class="devicon-laravel-original text-4xl text-gray-400 hover:text-[#FF2D20] transition-colors duration-300"
                                    title="Laravel"></i>
                                <i class="devicon-csharp-plain text-4xl text-gray-400 hover:text-[#239120] transition-colors duration-300"
                                    title="C#"></i>
                                <i class="devicon-mysql-original text-4xl text-gray-400 hover:text-[#4479A1] transition-colors duration-300"
                                    title="MySQL"></i>
                                <i class="devicon-azuresqldatabase-plain text-4xl text-gray-400 hover:text-[#0089D6] transition-colors duration-300"
                                    title="SQL"></i>
                                <i class="devicon-sqlite-plain text-4xl text-gray-400 hover:text-[#003B57] transition-colors duration-300"
                                    title="SQLite"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="group relative bg-white/5 backdrop-blur-sm p-8 rounded-xl border border-white/10 transition-all duration-500 hover:-translate-y-2 hover:border-emerald-500/50 hover:shadow-[0_20px_40px_-15px_rgba(16,185,129,0.3)]">
                        <div class="flex flex-col items-center">
                            <div
                                class="p-4 bg-emerald-500/10 rounded-xl mb-6 group-hover:scale-110 transition-transform duration-500">
                                <x-icons.tools class="w-12 h-12 text-emerald-400" />
                            </div>
                            <x-card-title>Outils</x-card-title>

                            <div class="flex flex-wrap justify-center gap-5">
                                <i class="devicon-git-plain text-4xl text-gray-400 hover:text-[#F05032] transition-colors duration-300"
                                    title="Git"></i>
                                <i class="devicon-github-original text-4xl text-gray-400 hover:text-white transition-colors duration-300"
                                    title="GitHub"></i>
                                <i class="devicon-vscode-plain text-4xl text-gray-400 hover:text-[#007ACC] transition-colors duration-300"
                                    title="VS Code"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- Section projets --}}
        <section id="projects"
            class="flex flex-col items-center justify-start  min-h-screen scroll-mt-20 py-12 md:py-20">

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

                    <div class="space-y-8 font-heading text-blanc">
                        <div>
                            <div class="space-y-6">
                                <div class="flex items-center gap-4 group">
                                    <div
                                        class="w-12 h-12 rounded-2xl bg-lime-500/10 flex items-center justify-center text-lime-400 group-hover:bg-lime-500 group-hover:text-[#242936] transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class=" text-gray-400 uppercase tracking-widest">Email</p>
                                        <a href="mailto:mathieu.moreau.webdev@gmail.com"
                                            class="text-blanc hover:text-gray-400 transition-colors">mathieu.moreau.webdev@gmail.com</a>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4 group">
                                    <div
                                        class="w-12 h-12 rounded-2xl bg-blue-500/10 flex items-center justify-center text-blue-400 group-hover:bg-blue-500 group-hover:text-[#242936] transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-gray-400 uppercase tracking-widest">Localisation</p>
                                        <p class="text-blanc">Saint-Sauveur, QC</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 pt-10 border-t  flex gap-4">
                                <a href="#"
                                    class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-white hover:text-[#242936] transition-all"><i
                                        class="devicon-linkedin-plain"></i></a>
                                <a href="#"
                                    class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-white hover:text-[#242936] transition-all"><i
                                        class="devicon-github-original"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
