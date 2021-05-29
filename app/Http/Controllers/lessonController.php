<?php

namespace App\Http\Controllers;

use App\Http\Requests\gradehomeworkRequest;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class lessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        $this->authorize('auth',$lesson);
        $posts = $lesson
        ->posts()
        ->latest()
        ->paginate(10);
        
        return view('clases.index',compact('lesson','posts'));
    }
    public function showStudents(Lesson $lesson)
    {
        $this->authorize('auth',$lesson);
        $students = $lesson->users()
        ->get();
        return view('clases.alumnos',compact('lesson','students'));
    }
    public function index()
    {
        $lessons=auth()
        ->user()
        ->Lessons()
        ->get();
        
        return view('clases.clases',compact('lessons'));
    }
    
    public function update(Lesson $lesson ,User $user, gradehomeworkRequest $request){
        $this->authorize('auth',$lesson);
        $lesson->users()->updateExistingPivot($user,[
            'score' => $request->score
        ]);
        return redirect()->back()->with('info','La calificacion ha sido actualizada');
    }
}
