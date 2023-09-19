<?php

namespace App\Http\Livewire;

use Livewire\Component;


class ProjectLivewireTableComponent extends Component
{
    public $projectKey = "";

    public function mount($id)
    {
        $this->projectKey = $id;
    }

    public function render()
    {
        return view('livewire.project-livewire-table-component', [
            'projectKey' => $this->projectKey
        ]);
    }
}
