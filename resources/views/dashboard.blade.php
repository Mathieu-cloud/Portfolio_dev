<x-layouts.app :title="__('Dashboard')">
    <div class="space-y-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-white">Mes projets</h2>
                <p class="text-gray-400 text-sm">Gérez vos réalisations affichées sur le portfolio.</p>
            </div>

            <a href="{{ route('admins.projects.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-900 hover:bg-indigo-800 text-white font-semibold rounded-lg shadow transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Créer un projet
            </a>
        </div>

        <hr class="border-gray-800">

        <div>
            <livewire:project-list />
        </div>
    </div>
</x-layouts.app>
