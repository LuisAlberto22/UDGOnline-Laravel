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
                ->paginate(5);
        return view('clases.index',compact('lesson','posts'));
    }

    public function index()
    {
        $lessons = auth()->user()->lessons;
        return view('clases.clases',compact('lessons'));
    }
}
