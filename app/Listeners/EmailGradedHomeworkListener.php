<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailGradedHomework;

class EmailGradedHomeworkListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        foreach ($event->users as $user) {
            if (isset($user->email)) {
                Mail::to($user->email)->send(new EmailGradedHomework($event->homework,$event->lesson));
            }
        }
    }
}
