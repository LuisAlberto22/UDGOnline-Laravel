<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homework extends Model
{
    use HasFactory;

    protected $table = "homeworks";
    
    protected $guarded = [];


    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->using(homework_user::class);
    }

    public  function files()
    {
        return $this->morphMany(file::class,'fileable');
    }

    public function commentaries()
    {
        return $this->morphMany(commentary::class,'commentarieable');
    }
}
