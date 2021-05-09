<?php

namespace App\Observers;

use App\Models\file;
use Illuminate\Support\Facades\Storage;

class fileObserver
{
 
 
    /**
     * Handle the file "updated" event.
     *
     * @param  \App\Models\file  $file
     * @return void
     */
    public function updated(file $file)
    {
        //
    }

    /**
     * Handle the file "deleted" event.
     *
     * @param  \App\Models\file  $file
     * @return void
     */
    public function deleting(file $file)
    {
        Storage::delete($file->link);
    }

    /**
     * Handle the file "restored" event.
     *
     * @param  \App\Models\file  $file
     * @return void
     */
    public function restored(file $file)
    {
        //
    }

    /**
     * Handle the file "force deleted" event.
     *
     * @param  \App\Models\file  $file
     * @return void
     */
    public function forceDeleted(file $file)
    {
        Storage::delete($file->link);
    }
}
