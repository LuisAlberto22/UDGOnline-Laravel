<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    /* public function score()
    {
        return $this->hasOne(lesson_user::class);
    } */
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

    public function lesson()
    {
        return $this->hasOne(Lesson::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function homeworks()
    {
        return $this->belongsToMany(homework::class);
    }

}
