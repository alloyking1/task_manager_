<?php

namespace App\Services;

use App\Dto\ProjectDto;
use App\Models\Project;
use App\Models\User;
use App\Traits\ProjectInviteTrait;

class ProjectService
{
    use ProjectInviteTrait;
    /**
     * Undocumented function
     *
     * @return void
     */
    public function create(ProjectDto $dto)
    {
        $project = Project::create([
            'user_id' => $dto->user_id,
            'name' => $dto->name,
            'description' => $dto->description
        ]);

        $this->sendInvite($project, $dto->invites);

        return;
    }
}
