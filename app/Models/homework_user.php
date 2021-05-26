<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\Pivot;

class homework_user extends MorphPivot
{
    public $incrementing = true;

    public function files_user()
    {
        return $this->morphMany(file::class,'fileable'); 
    }
}
