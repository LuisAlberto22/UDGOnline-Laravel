<?php

namespace App\Policies;

use App\Models\homework;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Lesson;

class homeworkPolicy
{
    use HandlesAuthorization;

    
    public function homeworkAuth(User $user,homework $homework,Lesson $lesson)
    {
        return $homework->lesson_id === $lesson->id 
                and $user->getAssigns()->find($homework->id);
    }
}
