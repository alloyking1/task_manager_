<?php

namespace App\Http\Livewire;

use App\Services\ProjectService;
use Livewire\Component;


class ProjectLivewireTableComponent extends Component
{
    public $projectKey = "";
    public $projectCollection = "";

    public function mount($id, ProjectService $projectService)
    {
        $this->projectKey = $id;
        $this->getOneProject($projectService);
    }

    public function getOneProject($projectService)
    {
        $this->projectCollection = $projectService->getProject($this->projectKey);
    }

    public function render()
    {
        return view('livewire.project-livewire-table-component', [
            'projects' => $this->projectCollection
        ]);
    }
}
