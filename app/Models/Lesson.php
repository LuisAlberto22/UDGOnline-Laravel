<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function playLists()
    {
        return $this->hasMany(playlist::class);
    }

    public function schedules()
    {
        return $this->hasMany(schedule::class);
    }

    public function homeworks()
    {
        return $this->hasMany(homework::class);
    }

    public function score_user(){
        return $this->hasOne(lesson_user::class);
    }

    public function posts()
    {
        return $this->hasMany(post::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
