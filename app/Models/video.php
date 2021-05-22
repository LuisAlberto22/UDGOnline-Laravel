<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function playList()
    {
        return $this->belongsTo(playlist::class);
    }

    public function commentaries()
    {
        return $this->morphMany(commentary::class,'commentarieable');
    }
}
