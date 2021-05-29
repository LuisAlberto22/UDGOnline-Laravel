<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

class streamController extends Controller
{
    public function __invoke(Lesson $lesson)
    {
        $this->authorize('auth',$lesson);
        $user = auth()->user();
        return view('clases.streaming.stream' , compact('lesson', 'user'));
    }
}
