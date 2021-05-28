<?php

namespace App\Listeners;

use App\Mail\EmailHomeworkAssigned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailHomeworkAssignedListener
{
    public function handle($event)
    {
        foreach ($event->users as $user) {
            if (isset($user->email)) {
                Mail::to($user->email)->send(new EmailHomeworkAssigned($event->homework,$event->lesson));
            }
        }
    }
}
