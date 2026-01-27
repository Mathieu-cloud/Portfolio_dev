 <section id="hero" x-data="heroAnimation"
     class="flex flex-col items-center justify-center relative overflow-hidden h-screen font-hero font-thin text-blanc">

     <div class="relative z-10 text-center w-full">
         <div x-show="showName" x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0" class="absolute inset-0 flex flex-col items-center justify-center">
             <h1 class="text-[3.25rem] sm:text-[6rem] flex flex-col">
                 <span>Mathieu Moreau</span>
             </h1>
         </div>

         <div x-show="!showName" x-cloak x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0" class="absolute inset-0 flex flex-col items-center justify-center">
             <p class="text-[2.5rem] sm:text-[5rem] uppercase tracking-wide sm:tracking-widest px-4">
                 DÉVELOPPEUR WEB
             </p>
         </div>
     </div>
     <div
         class="absolute bottom-12 left-1/2 transform -translate-x-1/2 flex items-center gap-8 font-heading text-lg uppercase tracking-[0.3em] text-blanc font-extralight">
         <a href="#projects" class="group relative py-2">
             <span>Projets</span>
             <span
                 class="absolute bottom-0 left-0 w-0 h-[1px] bg-blanc transition-all duration-300 group-hover:w-full"></span>
         </a>
         <span class="text-white/20">|</span>
         <a href="#contact" class="group relative py-2">
             <span>Contact</span>
             <span
                 class="absolute bottom-0 left-0 w-0 h-[1px] bg-blanc transition-all duration-300 group-hover:w-full"></span>
         </a>
     </div>
 </section>
