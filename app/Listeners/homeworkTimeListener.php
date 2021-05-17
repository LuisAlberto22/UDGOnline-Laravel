<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class homeworkTimeListener
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
        if ($event->homework_user->delivery_date <= $event->homework_user->pivot->updated_at) {
            $status = "Atrasada";
        } else {
            $status = "Entregada";
        }
        auth()->user()
            ->assigns()
            ->updateExistingPivot(
                $event->homework_user->id,
                ['status' => $status]
            );
    }
}
