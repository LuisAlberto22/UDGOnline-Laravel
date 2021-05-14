<?php

namespace App\Http\Controllers;

use App\Events\reviewEvent;
use App\Events\uploadHomework;
use App\Models\homework;
use App\Models\User;
use Illuminate\Http\Request;

use function App\Helpers\fileUpload\uploadFiles;

class studentHomeworkController extends Controller
{
    public function store($homework, Request $request)
    {
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
        return redirect()->back()->with('info','Tarea entregada');
    }
}
