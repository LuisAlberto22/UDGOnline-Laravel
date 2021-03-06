<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
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

    public function posts()
    {
        return $this->hasMany(post::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('score');
    }

    public function usersWithOutPivot()
    {
        return $this->belongsToMany(User::class);
    }
}
