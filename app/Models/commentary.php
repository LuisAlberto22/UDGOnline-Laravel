<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentary extends Model
{
    use HasFactory;

    public function commentarieable()
    {
        return $this->morphTo();
    }
    public function commentaries()
    {
        return $this->hasMany(commentary::class);
    }

    public function commentary()
    {
        return $this->belongsTo(commentary::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
