<?php

namespace App\Traits;

use App\Models\User;
use App\Notifications\ProjectInviteNotification;
use App\Notifications\ProjectInviteNotificationErrorFix;
use Exception;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;


trait ProjectInviteTrait
{
    use Notifiable;

    public function sendInvite($project, $members, $message = "you have been added to a project")
    {
        $invitedUsers = [];
        foreach ($members as $val) {
            $user = User::where('email', $val)->orWhere('id', $val)->get();
            // $project->members()->attach($user->pluck('id'));

            // array_push($invitedUsers, $user);
        }
        // dd($invitedUsers);

        try {
            Notification::send($user, new ProjectInviteNotificationErrorFix($message));

            // dd(Auth::user()->notify(new ProjectInviteNotification($message)));
        } catch (Exception $e) {
            dump($e->getMessage());
        }
    }
}
