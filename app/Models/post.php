<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->morphMany(file::class,'fileable');
    }

    public function commentaries()
    {
        return $this->morphMany(commentary::class,'commentarieable');
    }
}
