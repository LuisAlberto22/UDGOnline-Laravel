<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class lessonController extends Controller
{
    public function index(Lesson $lesson)
    {
        return view('clases.index',compact('lesson'));
    }
}
