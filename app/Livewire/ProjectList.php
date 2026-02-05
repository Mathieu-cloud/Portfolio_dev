<?php

namespace App\Livewire;

use App\Models\Projet;
use Livewire\Component;

class ProjectList extends Component
{
    public $isAdmin = false;

    public function placeholder()
    {
        return <<<'HTML'
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate-pulse">
            @for ($i = 0; $i < 3; $i++)
                <div class="bg-gray-800 border border-gray-700 rounded-md overflow-hidden">
                    <div class="h-48 bg-gray-700"></div>
                    <div class="p-5 space-y-3">
                        <div class="h-6 bg-gray-700 rounded w-3/4"></div>
                        <div class="h-4 bg-gray-700 rounded w-full"></div>
                        <div class="flex gap-2">
                            <div class="h-6 w-16 bg-gray-700 rounded"></div>
                            <div class="h-6 w-16 bg-gray-700 rounded"></div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        HTML;
    }

    public function render()
    {
        return view('livewire.project-list', [
            'projets' => Projet::latest()->get()
        ]);
    }
}
