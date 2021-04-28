<?php

namespace App\Observers;

use App\Models\lesson;

class lessonObserver
{
    /**
     * Handle the lesson "created" event.
     *
     * @param  \App\Models\lesson  $lesson
     * @return void
     */
    public function created(lesson $lesson)
    {
        //
    }

    /**
     * Handle the lesson "updated" event.
     *
     * @param  \App\Models\lesson  $lesson
     * @return void
     */
    public function updated(lesson $lesson)
    {
        //
    }

    /**
     * Handle the lesson "deleted" event.
     *
     * @param  \App\Models\lesson  $lesson
     * @return void
     */
    public function deleted(lesson $lesson)
    {
        //
    }

    /**
     * Handle the lesson "restored" event.
     *
     * @param  \App\Models\lesson  $lesson
     * @return void
     */
    public function restored(lesson $lesson)
    {
        //
    }

    /**
     * Handle the lesson "force deleted" event.
     *
     * @param  \App\Models\lesson  $lesson
     * @return void
     */
    public function forceDeleted(lesson $lesson)
    {
        //
    }
}
