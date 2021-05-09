<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'key',
        'career',
        'Cicle',
        'type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notifications()
    {
        return $this->belongsToMany(notification::class);
    }

    public function type()
    {
        return $this->belongsTo(type::class);
    }

    public function posts()
    {
        return $this->hasMany(post::class);
    }

    public function Lessons()
    {
        if ($this->hasRole("Alumno")) {
            return $this->belongsToMany(Lesson::class)->withPivot('score');
        }
        return $this->hasOne(Lesson::class);
    }

    public function getAssigns()
    {
        if ($this->hasRole("Alumno")) {
            return $this->belongsToMany(homework::class)
                    ->withPivot(['score','status','note'])
                    ->using(homework_user::class);
        }
        return $this->hasManyThrough(homework::class, lesson::class);
    }

    
}
