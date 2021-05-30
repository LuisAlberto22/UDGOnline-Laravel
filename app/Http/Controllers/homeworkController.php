<?php

namespace App\Http\Controllers;

use App\Models\homework;
use App\Models\Lesson;
use App\Events\homeworkCreatedEvent;
use App\Events\HomeworkDestroy;
use App\Events\unAssignHomeworkEvent;
use App\Http\Requests\homeworkRequest;
use App\Models\file;
use App\Models\User;
use Carbon\Exceptions\InvalidFormatException;
use Exception;
use Illuminate\Database\QueryException;

use function App\Helpers\fileUpload\uploadFiles;

class homeworkController extends Controller
{
    public function index(Lesson $lesson)
    {
        $this->authorize('auth', $lesson);
        $user = auth()->user();
        $homeworks = $user->getAssignsByLesson($lesson->id)
            ->paginate(5);
        return view('clases.tareas.tareas', compact('homeworks', 'lesson'));
    }

    public function show(Lesson $lesson, $homework)
    {
        $homework = auth()->user()->getAssign($homework);
        $this->authorize('auth', $lesson);
        $this->authorize('homeworkAuth', [$homework, $lesson]);
        return view('clases.tareas.ver', compact('lesson', 'homework'));
    }

    public function create(Lesson $lesson)
    {
        $this->authorize('auth', $lesson);
        $users = $lesson->users()->get();
        return view('clases.tareas.crear', compact('lesson', 'users'));
    }

    public function destroy(lesson $lesson, homework $homework)
    {
        $this->authorize('auth', $lesson);
        $this->authorize('homeworkAuth', [$homework, $lesson]);
        $homework->delete();
        event(new HomeworkDestroy($homework->users, $lesson->id));
        return redirect()->route('clases.tareas.index', compact('lesson'))->with('info', 'La tarea se ha eliminado correctamente');
    }

    public function edit(lesson $lesson, homework $homework)
    {
        $this->authorize('auth', $lesson);
        $this->authorize('homeworkAuth', [$homework, $lesson]);
        $users = $lesson->users()->get();
        return view('clases.tareas.modificar', compact('homework', 'lesson', 'users'));
    }

    public function update(lesson $lesson, homework $homework, homeworkRequest $request)
    {
        try {
            $this->authorize('auth', $lesson);
            $this->authorize('homeworkAuth', [$homework, $lesson]);
            $homework->update($request->all(['name', 'description', 'delivery_date']));
            $usersLesson = $lesson->users()->find($request->users);
            $users = $homework->users->diff($usersLesson);
            if ($request->hasFile('files')) {
                uploadFiles(homework::class, $homework->id, 'Clases/' . $lesson->nrc . '/' . $homework->slug . '/Maestro/files', $request->file('files'));
            }
            event(new unAssignHomeworkEvent($users, $lesson));
            $homework->users()->withTimestamps()->sync($usersLesson);
            return redirect()->route('clases.tareas.index', compact('lesson'))->with('info', 'La tarea se ha actualizado correctamente');
        } catch (QueryException $e) {
            return redirect()->route('clases.tareas.index', compact('lesson'))->with('info', 'Error al actualizar la tarea');
        }
    }

    public function destroyfile(Lesson $lesson, homework $homework, file $file)
    {
        $this->authorize('auth', $lesson);
        $this->authorize('homeworkAuth', [$homework, $lesson, $file]);
        $file->delete();
        return redirect()->back();
    }

    public function store(Lesson $lesson, homeworkRequest $request)
    {
        try {
            $this->authorize('auth', $lesson);
            $users = $lesson->users()->find($request->users);
            $homework = $lesson->homeworks()->create($request->all(['name', 'description', 'delivery_date']));
            if ($homework != false) {
                if ($request->hasFile('files')) {
                    uploadFiles(homework::class, $homework->id, 'Clases/' . $lesson->nrc . '/' . $homework->slug . '/Maestro/files', $request->file('files'));
                }
                event(new homeworkCreatedEvent($homework, $users, $lesson));
                return redirect()->route('clases.tareas.index', compact('lesson'))->with('info', 'La tarea se ha registrado correctamente');
            }
        } catch (QueryException $e) {
            return redirect()->route('clases.tareas.index', compact('lesson'))->with('info', 'Error al actualizar la tarea');
        }
    }
}
