<?php

namespace App\Listeners;

use App\Mail\EmailUploadHomework;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailUploadHomeworkListener
{
    public function handle($event)
    {
        if (isset($event->lesson->user->email)) {
            Mail::to($event->lesson->user->email)->send(new EmailUploadHomework($event->homework_user,$event->user,$event->lesson));
        }
    }
}
