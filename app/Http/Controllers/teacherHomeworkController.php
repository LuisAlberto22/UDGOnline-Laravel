<?php

namespace App\Http\Controllers;

use App\Models\homework;
use App\Models\Lesson;
use Illuminate\Http\Request;

class teacherHomeworkController extends Controller
{
    public function index(Lesson $lesson,homework $homework)
    {
        $students = $homework->users()->get();
        return view('clases.tareas.alumnos',compact('lesson','homework','students'));
    }
}
