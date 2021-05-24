<?php

namespace App\Helpers\fileUpload;

use App\Models\file;
use Illuminate\Support\Facades\Storage;

function uploadFiles($model,$id,$path,$files = [])
{
    foreach ($files as $file) {
        $slug = uniqid();
        $rootPath = Storage::putFileAs($path, $file ,$slug);
        if ($rootPath == false) {
            return back()->withErrors([
                'file' => 'Error al subir archivo'
            ]);
        }
        file::create([
            'name' => $file->getClientOriginalName(),
            'slug' => $slug,
            'link' => $rootPath,
            'type' => $file->extension(),
            'size' => $file->getSize(),
            'fileable_id' => $id,
            'fileable_type' => $model,
        ]);
    }
}
