<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\post;

class postHomeworkListener
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
        if($event->users == null){
            Post::create([
                'user_id' => $event->homework->lesson->user_id,
                'lesson_id' => $event->homework->lesson_id,
                'body' => $event->homework->description,
            ]);
        }     
    }
}
