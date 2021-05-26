<?php

namespace App\Observers;

use App\Models\homework_user;

class homework_userObserver
{
    /**
     * Handle the homework_user "created" event.
     *
     * @param  \App\Models\homework_user  $homework_user
     * @return void
     */
    public function created(homework_user $homework_user)
    {
        //
    }

    /**
     * Handle the homework_user "updated" event.
     *
     * @param  \App\Models\homework_user  $homework_user
     * @return void
     */
    public function updated(homework_user $homework_user)
    {
        //
    }

    /**
     * Handle the homework_user "deleted" event.
     *
     * @param  \App\Models\homework_user  $homework_user
     * @return void
     */
    public function deleting(homework_user $homework_user)
    {
        dd($homework_user->files_user);
    }

    /**
     * Handle the homework_user "restored" event.
     *
     * @param  \App\Models\homework_user  $homework_user
     * @return void
     */
    public function restored(homework_user $homework_user)
    {
        //
    }

    /**
     * Handle the homework_user "force deleted" event.
     *
     * @param  \App\Models\homework_user  $homework_user
     * @return void
     */
    public function forceDeleted(homework_user $homework_user)
    {
        //
    }
}
