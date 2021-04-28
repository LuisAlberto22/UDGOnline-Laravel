<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homework extends Model
{
    use HasFactory;

    protected $table = "homeworks";

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public  function files()
    {
        return $this->morphMany(file::class,'filesable');
    }

    public function commentaries()
    {
        return $this->morphMany(commentary::class,'commentarieable');
    }
}
