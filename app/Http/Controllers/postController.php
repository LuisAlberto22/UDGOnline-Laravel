<?php

namespace App\Http\Controllers;

use App\Http\Requests\postRequest;
use App\Models\Lesson;
use App\Models\post;
use Illuminate\Http\Request;

use function App\Helpers\fileUpload\uploadFiles;

class postController extends Controller
{
    public function store(Lesson $lesson, Request $request)
    {
        $post = $lesson->posts()->create($request->all());
        if ($request->hasFile('files')) {
            uploadFiles(post::class,$post->id,'Clases/'.$lesson->nrc.'/posts/files',$request->allFiles());
        }
    }

    public function destroy(post $post)
    {
        
    }
}
