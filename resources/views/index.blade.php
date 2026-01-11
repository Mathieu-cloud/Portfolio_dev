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
        <livewire:portfolio-nav />
    </header>

    <main class="bg-[#242936]">
        {{-- Section hero --}}
        <livewire:hero-animation />

        {{-- Section à propos --}}
        <section id="about" class="flex flex-col items-center justify-start  min-h-screen scroll-mt-20 py-12 md:py-20">
             <div class="text-center mb-16 md:mb-24">
                    <h2 class="text-5xl md:text-7xl font-black uppercase tracking-tighter text-white">
                       À <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Propos</span>
                    </h2>
                    <div class="h-1.5 w-24 bg-gradient-to-r from-blue-500 to-emerald-500 mx-auto mt-6 rounded-full">
                    </div>
                </div>
        </section>

        {{-- Section compétences --}}
        <section id="skills"
            class="flex flex-col items-center justify-start min-h-screen scroll-mt-20 py-16 md:py-24 bg-[#242936]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 w-full">

                <div class="text-center mb-16 md:mb-24">
                    <h2 class="text-5xl md:text-7xl font-black uppercase tracking-tighter text-white">
                        Mes <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Compétences</span>
                    </h2>
                    <div class="h-1.5 w-24 bg-gradient-to-r from-blue-500 to-emerald-500 mx-auto mt-6 rounded-full">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <div
                        class="group relative bg-white/5 backdrop-blur-sm p-8 rounded-xl border border-white/10 transition-all duration-500 hover:-translate-y-2 hover:border-blue-500/50 hover:shadow-[0_20px_40px_-15px_rgba(59,130,246,0.3)]">
                        <div class="flex flex-col items-center">
                            <div
                                class="p-4 bg-blue-500/10 rounded-xl mb-6 group-hover:scale-110 transition-transform duration-500">
                                <x-icons.front-end class="w-12 h-12 text-blue-400" />
                            </div>
                            <h3 class="text-2xl font-bold mb-8 text-[#dbe6cb] uppercase tracking-widest">Frontend</h3>

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
                            <h3 class="text-2xl font-bold mb-8 text-[#dbe6cb] uppercase tracking-widest">Backend</h3>

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
                            <h3 class="text-2xl font-bold mb-8 text-[#dbe6cb] uppercase tracking-widest">Outils</h3>

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

              <div class="text-center mb-16 md:mb-24">
                    <h2 class="text-5xl md:text-7xl font-black uppercase tracking-tighter text-white">
                        Mes <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Projets</span>
                    </h2>
                    <div class="h-1.5 w-24 bg-gradient-to-r from-blue-500 to-emerald-500 mx-auto mt-6 rounded-full">
                    </div>
                </div>
            <livewire:project-list />

        </section>

        {{-- Section contact --}}
        <section id="contact"
            class="flex flex-col items-center justify-start overflow-hidden scroll-mt-20 py-12 md:py-20">
            <div class="max-w-4xl mx-auto px-4 w-full relative">
                <div class="text-center mb-12">
                   <h2 class="text-5xl md:text-7xl font-black uppercase tracking-tighter text-white">
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Contact</span>
                    </h2>
                    <div class="h-1.5 w-24 bg-gradient-to-r from-blue-500 to-emerald-500 mx-auto mt-6 rounded-full">
                    </div>
                    <p class="text-[#dbe6cb] text-lg"></p>
                </div>

                <div class="relative z-10 max-w-2xl mx-auto">
                    <livewire:contact-form />
                </div>

                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-lime-500/10 blur-[120px] -z-10">
                </div>
            </div>
        </section>
    </main>
</body>

</html>
