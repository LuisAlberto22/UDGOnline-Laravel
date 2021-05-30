<?php

namespace App\Http\Controllers;

use App\Events\uploadHomework;
use App\Http\Requests\uploadHomeworkRequest;
use App\Models\homework;
use App\Models\homework_user;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\file;

use function App\Helpers\fileUpload\uploadFiles;

class studentHomeworkController extends Controller
{

    public function cancel(Lesson $lesson ,homework $homework, Request $request)
    {
        $this->authorize('auth',$lesson);
        $this->authorize('homeworkAuth',[$homework,$lesson]);
        auth()->user()->assigns()->updateExistingPivot($homework->id,[
            'status' => 'No Entregada',
            'delivered_date' => null
        ]);
        return redirect()->back();
    }

    public function store(Lesson $lesson,$homework, uploadHomeworkRequest $request)
    {
        $user = auth()->user();
        $studentHomework = $user->getAssign($homework);
        $this->authorize('auth',$lesson);
        $this->authorize('homeworkAuth',[$studentHomework,$lesson]);
        if ($request->hasFile('files')) {
            uploadFiles(
                homework_user::class,
                $studentHomework->pivot->id,
                "Clases/" . $studentHomework->lesson->nrc . "/" . $studentHomework->slug . "/Alumnos/" . $user->key,
                $request->file('files')
            );
        }
        event(new uploadHomework($studentHomework,$user,$lesson));
        return redirect()->route('clases.tareas.index',['lesson' => $studentHomework->lesson])->with('info','Tarea entregada');
    }
    
    public function destroy(Lesson $lesson , homework $homework , file $file)
    {
        $this->authorize('auth',$lesson);
        $this->authorize('homeworkAuth', [$homework, $lesson ,$file]);
        $file->delete();
        return redirect()->route('clases.tareas.show',compact('lesson','homework'));
    }
}
