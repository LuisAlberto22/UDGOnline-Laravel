<?php

namespace App\Http\Controllers;

use App\Models\homework;
use App\Models\Lesson;
use App\Events\homeworkCreatedEvent;
use App\Http\Requests\homeworkRequest;

use function App\Helpers\fileUpload\uploadFiles;

class homeworkController extends Controller
{
    public function index(Lesson $lesson)
    {
        $user = auth()->user();
        $homeworks = $user->getAssignsByLesson($lesson->id)
                          ->paginate(5);     
        return view('clases.tareas.tareas', compact('homeworks', 'lesson'));
    }

    public function show(Lesson $lesson, homework $homework)
    {
        $this->authorize('homeworkAuth',[$homework,$lesson]);
        return view('clases.tareas.ver',compact('lesson','homework'));
    }

    public function create(Lesson $lesson)
    {
        $users = $lesson->users()->get();
        return view('clases.tareas.crear', compact('lesson', 'users'));
    }

    public function edit(homework $homework)
    {
        
    }

    public function store(Lesson $lesson, homeworkRequest $request)
    {
       $homework = $lesson->homeworks()->create($request->all(['name','description','delivery_date'])); 
        if ($homework != false) {
            if ($request->hasFile('files')) {
                uploadFiles(homework::class, $homework->id, 'Clases/'.$lesson->nrc.'/'.$homework->slug.'/Maestro/files', $request->file('files'));
            }
            event(new homeworkCreatedEvent($homework, $request->users));
            return redirect()->route('clases.tareas.index',compact('lesson'))->with('alert','La tarea se ha registrado correctamente');
        }
        return redirect()->back()->withErrors([
            'file' => 'Error la subir el archivo'
        ]);
    }
}
