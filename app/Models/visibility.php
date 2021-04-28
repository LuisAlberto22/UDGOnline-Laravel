<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visibility extends Model
{
    use HasFactory;

    public function playLists()
    {
        return $this->hasMany(playlist::class);
    }

    public function videos()
    {
        return $this->hasMany(video::class);
    }
}
