<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

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
}
