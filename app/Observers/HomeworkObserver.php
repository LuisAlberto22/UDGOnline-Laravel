<?php

namespace App\Observers;

use App\Models\homework;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        Storage::delete($homework->lesson->nrc.'/'.$homework->id.'/Alumnos');
        Storage::delete($homework->lesson->nrc.'/'.$homework->id.'/Maestro');
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
