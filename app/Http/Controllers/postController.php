<?php

namespace App\Http\Controllers;

use App\Http\Requests\postRequest;
use App\Models\Lesson;
use App\Models\post;

use function App\Helpers\fileUpload\uploadFiles;

class postController extends Controller
{
    public function store(Lesson $lesson, postRequest $request)
    {
        $post = $lesson->posts()->create([
            'name' => $request->name,
            'body' =>$request->body,
        ]);
            
        if ($request->hasFile('files')) {
            uploadFiles(post::class,$post->id,'Clases/'.$lesson->nrc.'/posts/files',$request->allFiles());
        }
    }

    public function destroy(post $post)
    {
        
    }
}
