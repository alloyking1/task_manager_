<?php

namespace App\Services;

use App\Dto\ProjectDto;
use App\Models\Project;

class ProjectService
{

    /**
     * Undocumented function
     *
     * @return void
     */
    public function create(ProjectDto $dto)
    {
        return Project::create([
            'user_id' => $dto->user_id,
            'name' => $dto->name,
            'description' => $dto->description
        ]);

        //send request / add members to card
        //notify members via email
    }

    public function inviteMember()
    {
    }
}
