<?php

namespace App\Livewire;

use App\Models\Projet;
use Livewire\Component;

class ProjectList extends Component
{

    public $isAdmin = false;

    public function render()
    {
        return view('livewire.project-list', [
            'projets' => Projet::latest()->get()
        ]);
    }
}
