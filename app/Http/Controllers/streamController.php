<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class streamController extends Controller
{
    public function __invoke(Lesson $lesson)
    {
        $user = auth()->user();
        return view('clases.streaming.stream' , compact('lesson', 'user'));
    }
}
