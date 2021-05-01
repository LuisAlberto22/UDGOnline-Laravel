<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\video;
use Illuminate\Http\Request;

class videoController extends Controller
{
    public function index(Lesson $lesson)
    {
        $playlists = $lesson->playlists;
        return view('clases.videos.videos',compact('playlists','lesson'));
    }

    public function show(video $video)
    {
        return view('clases.videos.ver');
    }
    public function create()
    {
        return view('clases.videos.ver');
    }
}
