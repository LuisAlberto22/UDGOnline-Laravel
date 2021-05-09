<?php

namespace App\Observers;

use App\Models\post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

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
        $slug = uniqid();
        $post->slug = Str::slug($slug);
    }

    public function deleting(post $post)
    {
        if($post->files->count() > 0){
            foreach ($post->files as  $file) {
                $file->delete();
            }
        }
    }
}
