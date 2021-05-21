<?php

namespace App\Http\Controllers;

use App\Events\uploadHomework;
use App\Http\Requests\uploadHomeworkRequest;
use App\Models\homework;
use App\Models\homework_user;
use App\Models\Lesson;
use Illuminate\Http\Request;

use function App\Helpers\fileUpload\uploadFiles;

class studentHomeworkController extends Controller
{

    public function cancel(homework $homework,Lesson $lesson, Request $request)
    {
        $this->authorize('homeworkAuth',[$homework,$lesson]);
        auth()->user()->assigns()->updateExistingPivot($homework->id,[
            'status' => 'No Entregada',
        ]);
        return redirect()->back();
    }

    public function store($homework,Lesson $lesson, uploadHomeworkRequest $request)
    {
        $this->authorize('homeworkAuth',[$homework,$lesson]);
        $user = auth()->user();
        $studentHomework = $user->getAssign($homework);
        if ($request->hasFile('files')) {
            uploadFiles(
                homework_user::class,
                $studentHomework->pivot->id,
                "Clases/" . $studentHomework->lesson->nrc . "/" . $studentHomework->slug . "/Alumnos/" . $user->key,
                $request->file('files')
            );
            event(new uploadHomework($studentHomework));
        }
        return redirect()->route('clases.tareas.index',['lesson' => $studentHomework->lesson])->with('info','Tarea entregada');
    }
}
