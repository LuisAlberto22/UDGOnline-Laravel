<?php

namespace App\Observers;

use App\Models\post;
use Illuminate\Support\Facades\Storage;

class postObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \App\Models\post  $post
     * @return void
     */
    public function creating(post $post)
    {
        if (! \App::runningInConsole()) {
            $post->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Models\post  $post
     * @return void
     */
    public function updated(post $post)
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Models\post  $post
     * @return void
     */
    public function deleted(post $post)
    {
        

    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\Models\post  $post
     * @return void
     */
    public function restored(post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\Models\post  $post
     * @return void
     */
    public function forceDeleted(post $post)
    {
        //
    }
}
