<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class gradePoint
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $homeworks = $event->user
                           ->getAssignsByLesson($event->lesson)
                           ->wherePivot('status', 'Revisada')
                           ->get();
        $sum = $homeworks->sum(function ($homework) {
            return $homework->pivot->score;
        });
        $count = $homeworks->count();
        $event->user->lessons()->updateExistingPivot($event->lesson, [
            'score' => $sum / $count,
        ]);
    }
}
