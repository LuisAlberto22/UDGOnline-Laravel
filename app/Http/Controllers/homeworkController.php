<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class homeworkController extends Controller
{
    public function index(Lesson $lesson)
    {
        return view('clases.tareas.tareas',compact('lesson'));
    }
}
