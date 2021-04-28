<?php

namespace App\Observers;

use App\Models\homework;
use App\Models\post;

class HomeworkObserver
{
    /**
     * Handle the homework "created" event.
     *
     * @param  \App\Models\homework  $homework
     * @return void
     */
    public function creating(homework $homework)
    {
        post::create([
            'body' => $homework->description,
            'user_id' => $homework->lesson->user,
            'lesson_id' => $homework->lesson_id,
        ]);
    }

    /**
     * Handle the homework "updated" event.
     *
     * @param  \App\Models\homework  $homework
     * @return void
     */
    public function updated(homework $homework)
    {
        //
    }

    /**
     * Handle the homework "deleted" event.
     *
     * @param  \App\Models\homework  $homework
     * @return void
     */
    public function deleted(homework $homework)
    {
        //
    }

    /**
     * Handle the homework "restored" event.
     *
     * @param  \App\Models\homework  $homework
     * @return void
     */
    public function restored(homework $homework)
    {
        //
    }

    /**
     * Handle the homework "force deleted" event.
     *
     * @param  \App\Models\homework  $homework
     * @return void
     */
    public function forceDeleted(homework $homework)
    {
        //
    }
}
