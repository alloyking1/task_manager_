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
    public function createOrEdit(ProjectDto $dto, $id = null)
    {
        $project = Project::updateOrCreate(
            ['id' => $id],
            [
                'user_id' => $dto->user_id,
                'name' => $dto->name,
                'description' => $dto->description
            ]
        );

        if ($id === null) {

            $this->sendInvite($project, $dto->invites);
        }

        return;
    }

    public function delete($id)
    {
        return Project::find($id)->delete();
    }

    public function getProjectFullRelationships($id)
    {
        return Project::where('id', $id)->with(['tables' => ['task']])->get();
    }
}
