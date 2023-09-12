<?php

namespace App\Http\Livewire;

use App\Services\ProjectService;
use App\Dto\ProjectDto;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class ProjectLivewireComponent extends Component
{
    public $name = "";
    public $description = "";

    public function create(ProjectService $service)
    {

        $validated = $this->validate([
            'name' => 'required|min:3',
            'description' => 'sometimes|min:3',
        ]);

        $save = $service->create(ProjectDto::requestValue(['user_id' => Auth::id(), 'name' => $this->name, 'description' => $this->description]));
        $this->reset();
    }

    public function edit()
    {
    }

    public function render()
    {
        return view('livewire.project-livewire-component', [
            'projects' => Project::where('user_id', Auth::id())->get()
        ]);
    }
}
