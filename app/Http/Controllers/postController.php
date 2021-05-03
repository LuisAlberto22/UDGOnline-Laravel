<?php

namespace App\Http\Controllers;

use App\Events\uploadFileEvent;
use App\Http\Requests\postRequest;
use App\Models\file;
use App\Models\Lesson;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class postController extends Controller
{
    public function store(Lesson $lesson, postRequest $request)
    {
        $post = $lesson->posts()->create([
            'name' => $request->name,
            'body' =>$request->body,
        ]);
        
        if ($request->hasFile('files')) {
            event(new uploadFileEvent($post,$request->file('files'),'Clases/'.$lesson->nrc.'/posts/files'));
        }
    }

    public function destroy(post $post)
    {
        
    }
}
