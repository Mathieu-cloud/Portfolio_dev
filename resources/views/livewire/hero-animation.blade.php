 <section id="hero" x-data="heroAnimation"
     class="flex flex-col items-center justify-center relative overflow-hidden scroll-mt-20 py-20 min-h-[400px]">

     <div class="relative z-10 text-center w-full">
         <div x-show="showName" x-transition:enter="transition ease-out duration-2000 delay-800"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-2000"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 flex flex-col items-center justify-center">
             <h1 class="text-[3.25rem] sm:text-[6rem]  text-[#dbe6cb] font-light flex flex-col">
                 <span>Mathieu Moreau</span>
             </h1>
         </div>

         <div x-show="!showName" x-cloak x-transition:enter="transition ease-out duration-2000 delay-800"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-2000"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 flex flex-col items-center justify-center">
             <p class="text-[3.25rem] sm:text-[5rem] text-[#dbe6cb] font-light uppercase tracking-widest">
                 DÉVELOPPEUR WEB
             </p>
         </div>
     </div>
 </section>
