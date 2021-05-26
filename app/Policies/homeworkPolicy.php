<?php

namespace App\Policies;

use App\Models\file;
use App\Models\homework;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Lesson;

class homeworkPolicy
{
    use HandlesAuthorization;

    public function homeworkAuth(User $user,homework $homework,Lesson $lesson,?file $file = null)
    {
        $model = "";
        if ($user->getAssignsByLesson($lesson->id)->find($homework->id)) {
            if(isset($file)){
                if ($user->hasRole("Alumno")) {
                    $model = 'App\Models\homework_user';
                }else{
                    $model = 'App\Models\homework';
                }
                return $file->fileable_type == $model and $file->fileable_id = $homework->id;
            }
            return true;
        }
        return false;
    }
}
