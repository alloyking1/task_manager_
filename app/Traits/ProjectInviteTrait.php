<?php

namespace App\Traits;

use App\Models\User;

trait ProjectInviteTrait
{
    use NotificationTrait;

    public function sendInvite($project, $members)
    {
        $invitedUserIds = [];
        foreach ($members as $val) {
            $id = User::where('email', $val)->orWhere('id', $val)->get();
            array_push($invitedUserId, $id);
        }
        $project->members()->attach($invitedUserIds);

        $this->sendNotification($invitedUserIds, 'You have been added to a project');
    }
}
