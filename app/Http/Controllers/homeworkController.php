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

    public function show(?Lesson $lesson,homework $homework)
    {
       // $this->authorize('homework',$homework);
       return view('locacizacion del view');
    }
    
    public function create()
    {
        /*         event(new homeworkCreatedEvent($homework,'all'));
        */
        return view('locacizacion del view');
    }
    
    public function edit(homework $homework)
    {
        return view('locacizacion del view');
    }

    public function store()
    {
/*         event(new homeworkCreatedEvent($homework,'all'));
 */ }
}
