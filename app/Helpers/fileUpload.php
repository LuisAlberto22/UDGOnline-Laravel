<?php

namespace App\Helpers\fileUpload;

use App\Models\file;
use Illuminate\Support\Facades\Storage;

function uploadFiles($model,$id,$path,$files = [])
{
    foreach ($files as $file) {
        $rootPath = Storage::putFile($path, $file ,'public');
        if ($rootPath == false) {
            return back()->withErrors([
                'file' => 'Error al subir archivo'
            ]);
        }
        file::create([
            'name' => $file->getClientOriginalName(),
            'link' => $rootPath,
            'type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'fileable_id' => $id,
            'fileable_type' => $model,
        ]);
    }
}
