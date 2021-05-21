<?php

namespace App\Http\Controllers;

use App\Models\file;
use App\Models\video;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class fileController extends Controller
{
    public function downloadFile(file $file)
    {
        return $this->download($file);
    }

    private function download(Model $model)
    {
        try {
            $url = Storage::path($model->link);
            return response()->download($url);
        } catch (FileNotFoundException $e) {
            return redirect()->back()->with('info', 'Archivo no existente');
        }
    }

    public function downloadVideo(video $video)
    {
        return $this->download($video);
    }
}
