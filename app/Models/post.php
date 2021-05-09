<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $guarded = [
        'user_id',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
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
