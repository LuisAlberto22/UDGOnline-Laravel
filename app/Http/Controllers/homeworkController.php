<?php

namespace App\Http\Controllers;

use App\Events\homeworkCreatedEvent;
use App\Models\homework;
use App\Models\Lesson;
use Illuminate\Http\Request;

class homeworkController extends Controller
{
    public function index(Lesson $lesson)
    {
        return view('clases.tareas.tareas',compact('lesson'));
    }

    public function show(Lesson $lesson,homework $homework)
    {
       // $this->authorize('homework',$homework);
       return $homework;
    }

    public function store()
    {
/*         event(new homeworkCreatedEvent($homework,'all'));
 */ }
}
