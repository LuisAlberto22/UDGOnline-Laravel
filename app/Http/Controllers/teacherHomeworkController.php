<?php

namespace App\Http\Controllers;

use App\Events\reviewEvent;
use App\Models\homework;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class teacherHomeworkController extends Controller
{
    public function index(Lesson $lesson, homework $homework)
    {
        $this->authorize('auth',$lesson);
        $this->authorize('homeworkAuth', [$homework, $lesson]);
        $students = $homework->users()
            ->get();
        return view('clases.tareas.alumnos', compact('lesson', 'homework', 'students'));
    }

    public function show(Lesson $lesson, $homework , User $user)
    {
        $studentHomework = $user->getAssign($homework);
        $this->authorize('auth',$lesson);
        $this->authorize('homeworkAuth', [$studentHomework, $lesson]);
        return view('clases.tareas.revisar',compact('user','lesson','studentHomework'));
    }

    public function review(Lesson $lesson, $homework, User $user, Request $request)
    {
        $studentHomework = $user->getAssign($homework);
        $this->authorize('auth',$lesson);
        $this->authorize('homeworkAuth',[$studentHomework,$lesson]);
        $status = 'Revisada';
        $user->getAssignsByLesson($studentHomework->lesson_id)
             ->updateExistingPivot($studentHomework->id,[
                 'status' => $status,
                 'score'=>$request->score,
                 'note' =>$request->note
                 ]);
        event(new reviewEvent([$user], $lesson , $studentHomework)); 
        return redirect()->route('clases.tareas.students',compact('lesson','homework'))->with('info','Tarea Revisada');
    }
}
