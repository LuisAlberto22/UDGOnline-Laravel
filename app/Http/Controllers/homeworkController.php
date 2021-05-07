<?php

namespace App\Http\Controllers;

use App\Models\homework;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Events\homeworkCreatedEvent;

use function App\Helpers\fileUpload\uploadFiles;

class homeworkController extends Controller
{
    public function index(Lesson $lesson)
    {
        $user = auth()->user();
        $homeworks = $user->getAssigns()
                          ->where('lesson_id', $lesson->id)
                          ->paginate(5);
                          
        return view('clases.tareas.tareas', compact('homeworks', 'lesson'));
    }

    public function show(?Lesson $lesson, homework $homework)
    {
        // $this->authorize('homework',$homework);
        return view('locacizacion del view');
    }

    public function create(Lesson $lesson)
    {
        $users = $lesson->users()->get();
        return view('clases.tareas.crear', compact('lesson', 'users'));
    }

    public function edit(homework $homework)
    {
        
    }

    public function store(Lesson $lesson, Request $request)
    {
    
       $homework = $lesson->homeworks()->create([
            'name' =>  $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'delivery_date' => $request->delivery_date,
        ]); 
        if ($homework != false) {
            if ($request->hasFile('files')) {
                uploadFiles(homework::class, 23, 'Clases/'.$lesson->nrc.'/'.$homework->id.'/files', $request->file('files'));
            }
            event(new homeworkCreatedEvent($homework, $request->users));
            return redirect()->route('clases.tareas',compact('lesson'))->with('alert','La tarea se ha registrado correctamente');
        }
        return back()->withErrors([
            'file' => 'Error la subir el archivo'
        ]);
    }
}
