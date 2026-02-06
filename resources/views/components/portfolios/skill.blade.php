<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <div
    {{-- Front-end skills --}}
        class="group relative bg-white/5 backdrop-blur-sm p-8 rounded-xl border border-white/10 transition-all duration-500 hover:-translate-y-2 hover:border-blue-500/50 hover:shadow-[0_20px_40px_-15px_rgba(59,130,246,0.3)]">
        <div class="flex flex-col items-center">
            <div class="p-4 bg-blue-500/10 rounded-xl mb-6 group-hover:scale-110 transition-transform duration-500">
                <x-icons.front-end class="w-12 h-12 text-blue-400" />
            </div>
            <x-portfolios.card-title>Front-end</x-portfolios.card-title>

            <div class="flex flex-wrap justify-center gap-5">
                <x-icons.devicon.html5 class="w-9 h-9 text-gray-400 hover:text-[#E34F26] transition-colors duration-300"
                    title="HTML5" />
                <x-icons.devicon.css3 class="w-9 h-9 text-gray-400 hover:text-[#1572B6] transition-colors duration-300"
                    title="CSS3" />
                <x-icons.devicon.sass class="w-9 h-9 text-gray-400 hover:text-[#CC6699] transition-colors duration-300"
                    title="Sass" />
                <x-icons.devicon.tailwindcss class="w-9 h-9 text-gray-400 hover:text-[#06B6D4] transition-colors duration-300"
                    title="Tailwind CSS" />
                <x-icons.devicon.javascript class="w-9 h-9 text-gray-400 hover:text-[#F7DF1E] transition-colors duration-300"
                    title="JavaScript" />
                <x-icons.devicon.vuejs class="w-9 h-9 text-gray-400 hover:text-[#4FC08D] transition-colors duration-300"
                    title="Vue.js" />
                <x-icons.devicon.alpinejs class="w-9 h-9 text-gray-400 hover:text-[#8BC0D0] transition-colors duration-300"
                    title="Alpine.js" />
                <x-icons.devicon.jquery class="w-9 h-9 text-gray-400 hover:text-[#0769AD] transition-colors duration-300"
                    title="jQuery" />
            </div>
        </div>
    </div>

    <div
    {{-- Back-end skills --}}
        class="group relative bg-white/5 backdrop-blur-sm p-8 rounded-xl border border-white/10 transition-all duration-500 hover:-translate-y-2 hover:border-purple-500/50 hover:shadow-[0_20px_40px_-15px_rgba(168,85,247,0.3)]">
        <div class="flex flex-col items-center">
            <div class="p-4 bg-purple-500/10 rounded-xl mb-6 group-hover:scale-110 transition-transform duration-500">
                <x-icons.back-end class="w-12 h-12 text-purple-400" />
            </div>
            <x-portfolios.card-title>Back-end</x-portfolios.card-title>

            <div class="flex flex-wrap justify-center gap-5">
                <x-icons.devicon.php class="w-9 h-9 text-gray-400 hover:text-[#777BB4] transition-colors duration-300"
                    title="PHP" />
                <x-icons.devicon.laravel class="w-9 h-9 text-gray-400 hover:text-[#FF2D20] transition-colors duration-300"
                    title="Laravel" />
                <x-icons.devicon.csharp class="w-9 h-9 text-gray-400 hover:text-[#239120] transition-colors duration-300"
                    title="C#" />
                <x-icons.devicon.mysql class="w-9 h-9 text-gray-400 hover:text-[#4479A1] transition-colors duration-300"
                    title="MySQL" />
                <x-icons.devicon.azuresqldatabase class="w-9 h-9 text-gray-400 hover:text-[#0089D6] transition-colors duration-300"
                    title="SQL" />
                <x-icons.devicon.sqlite class="w-9 h-9 text-gray-400 hover:text-[#003B57] transition-colors duration-300"
                    title="SQLite" />
            </div>
        </div>
    </div>

    <div
    {{-- Tools --}}
        class="group relative bg-white/5 backdrop-blur-sm p-8 rounded-xl border border-white/10 transition-all duration-500 hover:-translate-y-2 hover:border-emerald-500/50 hover:shadow-[0_20px_40px_-15px_rgba(16,185,129,0.3)]">
        <div class="flex flex-col items-center">
            <div class="p-4 bg-emerald-500/10 rounded-xl mb-6 group-hover:scale-110 transition-transform duration-500">
                <x-icons.tools class="w-12 h-12 text-emerald-400" />
            </div>
            <x-portfolios.card-title>Outils</x-portfolios.card-title>

            <div class="flex flex-wrap justify-center gap-5">
                <x-icons.devicon.git class="w-9 h-9 text-gray-400 hover:text-[#F05032] transition-colors duration-300"
                    title="Git" />
                <x-icons.devicon.github class="w-9 h-9 text-gray-400 hover:text-white transition-colors duration-300"
                    title="GitHub" />
                <x-icons.devicon.vscode class="w-9 h-9 text-gray-400 hover:text-[#007ACC] transition-colors duration-300"
                    title="VS Code" />
            </div>
        </div>
    </div>

</div>
