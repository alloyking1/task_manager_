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
    public $invites = [];
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function save(ProjectService $service)
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'sometimes|min:3',
            'invites' => 'sometimes|array'
        ]);
        $this->invites = [Auth::id()];
        $save = $service->create(ProjectDto::requestValue(['user_id' => Auth::id(), 'name' => $this->name, 'description' => $this->description, 'invites' => $this->invites]));
        $this->reset();
    }

    public function edit()
    {
    }

    public function delete($id, ProjectService $service)
    {
        $service->delete($id);
    }

    public function render()
    {
        return view('livewire.project-livewire-component', [
            'projects' => Project::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get()
        ]);
    }
}
