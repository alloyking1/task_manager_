<?php

namespace App\Http\Livewire;

use App\Services\ProjectService;
use App\Dto\ProjectDto;

use App\Models\Project;
use App\Notifications\ProjectInvitationNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class ProjectLivewireComponent extends Component
{
    public $name = "";
    public $description = "";
    public $projectId = "";
    public $invites = [];

    public function create(ProjectService $service)
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'sometimes|min:3',
            'invites' => 'sometimes|array'
        ]);
        $this->invites = [Auth::id(), 'test2@gmail.com'];
        $service->createOrEdit(ProjectDto::requestValue(['user_id' => Auth::id(), 'name' => $this->name, 'description' => $this->description, 'invites' => $this->invites]), $this->projectId);
        $this->reset();
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $this->name = $project->name;
        $this->description = $project->description;
        $this->projectId = $project->id;
    }

    public function delete($id, ProjectService $service)
    {
        $service->delete($id);
    }

    public function show($id)
    {
        redirect()->route('project.show', $id);
    }


    public function render()
    {
        return view('livewire.project-livewire-component', [
            'projects' => Project::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get()
        ]);
    }
}
