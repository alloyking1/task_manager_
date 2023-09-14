<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait NotificationTrait
{

    public function sendNotification($users, $message, $emailUser = false)
    {
        foreach ($users as $user) {
            DB::table('notification')->insert(['user_id' => $user, 'message' => $message]);
        }


        //send email
        //queue email
    }
}
