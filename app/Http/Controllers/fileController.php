<?php

namespace App\Http\Controllers;

use App\Models\file;
use App\Models\video;
use GuzzleHttp\Psr7\MimeType;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class fileController extends Controller
{
    public function downloadFile(file $file)
    {
        try {
            $url = Storage::path($file->link);
            return response()->download($url,$file->name);
        } catch (FileNotFoundException $e) {
            return redirect()->back()->with('info', 'Archivo no existente');
        }
    }
}
