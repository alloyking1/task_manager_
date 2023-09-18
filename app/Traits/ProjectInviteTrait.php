<?php

namespace App\Traits;

use App\Models\User;
use App\Notifications\ProjectInvitationNotification;
use Exception;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


trait ProjectInviteTrait
{
    use Notifiable;

    public function sendInvite($project, $members, $message = ["name" => 'message', "body" => 'notification body'])
    {
        $invitedUsers = [];
        foreach ($members as $val) {
            $user = User::where('email', $val)->orWhere('id', $val)->get();
            $project->members()->attach($user->pluck('id'));
            array_push($invitedUsers, $user);
        }

        try {
            Notification::send($user, new ProjectInvitationNotification(['name' => 'moses', 'body' => 'this is the notification body']));
        } catch (Exception $e) {
            dump($e->getMessage());
        }
    }



    // DB::table('notifications')->insert([
    //     'id' => '', 
    //     'type' => '', 
    //     'notifiable_type' => '', 
    //     'notifiable_id' => '', 
    //     'data' => '', 
    //     'read_at' => '', 
    //     'created_at' => '', 
    //     'updated_at' => '', 
    // ]);
    // array_push($invitedUsers, $user);
}
