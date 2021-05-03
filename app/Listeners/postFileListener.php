<?php

namespace App\Listeners;

use App\Models\file;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class postFileListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        foreach ($event->files as $file) {
            $path = Storage::putFile($event->path, $file);
            if ($path == false) {
                return back()->withErrors([
                    'file' => 'Error al subir archivo'
                ]);
            }
            file::create([
                'name' => $file->getClientOriginalName(),
                'link' => $path,
                'type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'filesable_id' => $event->from->id,
                'fileasable_type' => post::class,
            ]);
        }
    }
}
