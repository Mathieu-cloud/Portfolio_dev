<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Portfolio</title>
</head>

<body class="antialiased text-gray-200">
    <header>
        < x-portfolio.navbar />
    </header>

    <main class="bg-[#0f172a]">
        <section id="hero"
            class="scroll-mt-80 relative min-h-screen flex flex-col items-center justify-start overflow-hidden pt-20">
            <div class="relative z-10 text-center">
                <p class="text-[2.25rem] text-[#22d3ee]">Mathieu Moreau</p>
                <h1 class="text-[1.5rem] mt-4 text-[#fff]">Développeur web full stack</h1>
            </div>
        </section>
        <section id="about"
            class="scroll-mt-80 relative min-h-screen flex flex-col items-center justify-start overflow-hidden pt-30">
            <h2 class="text-4xl md:text-7xl font-black">
                < À PROPOS />
            </h2>
        </section>
        <section id="skills"
            class="scroll-mt-80 relative min-h-screen flex flex-col items-center justify-start overflow-hidden pt-30">
            <h2 class="text-4xl md:text-7xl font-black">
                < COMPÉTENCES />
            </h2>
        </section>
        <section id="projects"
            class="scroll-mt-80 relative min-h-screen flex flex-col items-center justify-start overflow-hidden pt-30">
            <h2 class="text-4xl md:text-7xl font-black">
                < PROJETS />
            </h2>
        </section>
        <section id="contact"
            class="scroll-mt-80 relative min-h-screen flex flex-col items-center justify-start overflow-hidden pt-30">
            <h2 class="text-4xl md:text-7xl font-black">
                < CONTACTEZ-MOI />
            </h2>
        </section>
    </main>
</body>

</html>
