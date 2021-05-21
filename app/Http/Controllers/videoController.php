<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\video;
use Illuminate\Http\Request;

class videoController extends Controller
{
    public function index(Lesson $lesson)
    {
        $videos = $lesson->playlists;
        return view('clases.videos.videos',compact('videos','lesson'));
    }

    public function show(video $video)
    {
        return view('clases.videos.ver',compact('video'));
    }
}
