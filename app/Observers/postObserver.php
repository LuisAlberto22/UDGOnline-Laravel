<?php

namespace App\Observers;

use App\Models\file;
use App\Models\post;
use Illuminate\Support\Facades\App;

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
        $post->user_id = auth()->user()->id;
    }

    public function deleting(post $post)
    {
        if($post->files->count() > 0){
            foreach ($post->files as  $file) {
                file::destroy($file);
            }
        }
    }
}
