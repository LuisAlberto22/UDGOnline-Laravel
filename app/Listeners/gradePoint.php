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
        foreach($event->users as $user){
            $homeworks = $user
            ->getAssignsByLesson($event->lesson->id)
            ->wherePivot('status', 'Revisada')
            ->get();
            $score = 0.00;
            $count = $homeworks->count();
            if ($count > 0) {
                $score = $homeworks->sum(function ($homework) {
                    return $homework->pivot->score;
                }) / $count;                
            }
            $user->lessons()->updateExistingPivot($event->lesson, [
                'score' => $score,
                ]);
            }
        }
}
