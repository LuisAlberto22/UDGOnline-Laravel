<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    use HasFactory;

    public function videos()
    {
        return $this->hasMany(video::class);
    }

    public function visibility()
    {
        return $this->belongsTo(visibility::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
