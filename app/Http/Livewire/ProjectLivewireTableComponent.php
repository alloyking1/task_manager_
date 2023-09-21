<?php

namespace App\Http\Livewire;

use App\Dto\TaskDto;
use App\Services\ProjectService;
use App\Services\TaskService;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class ProjectLivewireTableComponent extends Component
{
    public $projectKey = "";
    public $projectCollection = "";

    public $taskName;
    public $tableId = "";

    public $tableKey = [];

    public function mount($id, ProjectService $projectService)
    {
        $this->projectKey = $id;
        $this->getOneProject($projectService);
    }

    public function getOneProject($projectService)
    {
        return $this->projectCollection = $projectService->getProjectFullRelationships($this->projectKey);
    }

    public function createTask(TaskService $taskService, ProjectService $projectService)
    {
        dd($this->tableId);
        $this->validate([
            'taskName' => 'required|min:3',
            'tableId' => 'required|numeric',
        ]);

        $taskService->createOrUpdateTask(TaskDto::requestValue([
            'user_id' => Auth::id(),
            'table_id' => $this->tableId,
            'name' => $this->taskName,
            'priority' => 1,
        ]));

        $this->projectCollection = $this->getOneProject($projectService);
        $this->reset(['taskName']);
    }

    public function render()
    {
        return view('livewire.project-livewire-table-component', [
            'projects' => $this->projectCollection
        ]);
    }
}
