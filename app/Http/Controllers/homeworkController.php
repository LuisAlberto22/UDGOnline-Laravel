<?php

namespace App\Http\Controllers;

use App\Events\homeworkCreatedEvent;
use App\Models\homework;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        
    }
    
    public function edit(homework $homework)
    {
        return view('locacizacion del view');
    }

    public function store(Lesson $lesson,Request $request)
    {
        $homework = homework::create([
                'name' =>  $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'delivery_date' => $request->delivery_date,
                'lesson_id' => $lesson->id
        ]);
        event(new homeworkCreatedEvent($homework,$request->users));
    }
}
