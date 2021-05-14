<?php

namespace App\Http\Controllers;

use App\Models\homework;
use App\Models\Lesson;

class teacherHomeworkController extends Controller
{
    public function index(Lesson $lesson,homework $homework)
    {
        $students = $homework->users()
                             ->get();
        return view('clases.tareas.alumnos',compact('lesson','homework','students'));
    }

    public function review(homework $homework)
    {
        
    }
}
