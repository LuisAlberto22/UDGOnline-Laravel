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
    
    public function create(Lesson $lesson)
    {
        $users = $lesson->users()->get();
        return view('clases.tareas.crear',compact('lesson','users'));
    }
    
    public function edit(homework $homework)
    {
        
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
        dd($request);
        event(new homeworkCreatedEvent($homework,$request->users));
    }
}
