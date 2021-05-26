<?php

namespace App\Observers;

use App\Models\homework;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\file;
use Illuminate\Support\Facades\DB;

class HomeworkObserver
{
    /**
     * Handle the homework "created" event.
     *
     * @param  \App\Models\homework  $homework
     * @return void
     */
    public function created(homework $homework)
    {
        Storage::makeDirectory('Clases/'.$homework->lesson->nrc.'/'.$homework->slug.'/Alumnos');
        Storage::makeDirectory('Clases/'.$homework->lesson->nrc.'/'.$homework->slug.'/Maestro');
    }

    public function creating(homework $homework)
    {
        $slug = uniqid();
        $homework->slug = $slug;
    }
    
    /**
     * Handle the homework "updated" event.
     *
     * @param  \App\Models\homework  $homework
     * @return void
     */
    public function updated(homework $homework)
    {
       if ($homework->users->count == 0) {
           $homework->delete();
       }
    }
    

    public function deleting(homework $homework)
    {
        $homework->files()->delete();
        $homework->users()->detach([$homework->users]);
        Storage::deleteDirectory('Clases/'.$homework->lesson->nrc.'/'.$homework->slug);
    }
    
    
    /**
     * Handle the homework "force deleted" event.
     *
     * @param  \App\Models\homework  $homework
     * @return void
     */
    public function forceDeleted(homework $homework)
    {
        Storage::deleteDirectory('Clases/'.$homework->lesson->nrc.'/'.$homework->slug);
    }
}
