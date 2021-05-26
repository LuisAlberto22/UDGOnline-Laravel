<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DestroyFilesHomeworkEvent
{
   
    public function handle($event)
    {
        foreach ($event->users as $user) {
            foreach ($user->pivot->files_user as $file) {
                $file->delete();
            }
        }
    }
}
