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
    public function updating(file $file)
    {
        Storage::delete($file->link);
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
}
