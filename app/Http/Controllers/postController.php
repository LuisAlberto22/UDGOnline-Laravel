<?php

namespace App\Http\Controllers;

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
            uploadFiles(post::class, $post->id, 'Clases/' . $lesson->nrc . '/posts/files', $request->file('files'));
        }
        return redirect()->back();
    }

    public function destroy(Lesson $lesson, post $post)
    {
        $post->delete();
        return redirect()
            ->back()
            ->with('info', 'Se ha eliminado con exito');
    }
}
