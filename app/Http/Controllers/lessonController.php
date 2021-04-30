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
        if (auth()->user()->type_id == 1) {
            $lessons = auth()
                ->user()
                ->lessons;
        } else {
            $lessons = auth()
                ->user()
                ->lesson()
                ->get();
        }
        return view('clases.clases',compact('lessons'));
    }
}
