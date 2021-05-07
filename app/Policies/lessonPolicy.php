<?php

namespace App\Policies;

use App\Models\homework;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class lessonPolicy
{
    use HandlesAuthorization;

    public function auth(User $user, Lesson $lesson)
    {
        return  $user->lessons()->find($lesson->id) != null
        or $lesson->user_id == $user->id;
    }
}
