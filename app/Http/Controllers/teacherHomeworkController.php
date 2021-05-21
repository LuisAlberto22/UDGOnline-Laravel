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
        $students = $homework->users()
            ->get();
        return view('clases.tareas.alumnos', compact('lesson', 'homework', 'students'));
    }

    public function show(Lesson $lesson, $homework , User $user)
    {
        $studentHomework = $user->getAssign($homework);
        return view('clases.tareas.revisar',compact('user','lesson','studentHomework'));
    }

    public function review(Lesson $lesson,$homework, User $user, Request $request)
    {
        $studentHomework = $user->getAssign($homework);
        $status = 'Revisada';
        $user->getAssignsByLesson($studentHomework->lesson_id)
             ->updateExistingPivot($studentHomework->id,[
                 'status' => $status,
                 'score'=>$request->score,
                 'note' =>$request->note
                 ]);
        event(new reviewEvent($user, $lesson->id)); 
        return redirect()->route('clases.tareas.index',['lesson' => $studentHomework->lesson])->with('info','Tarea entregada');
    }
}
