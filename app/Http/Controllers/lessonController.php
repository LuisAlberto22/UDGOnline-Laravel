<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\post;

class lessonController extends Controller
{
    public function show(Lesson $lesson)
    {
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
