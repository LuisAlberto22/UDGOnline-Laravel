<?php

namespace App\Providers;

use App\Models\homework;
use App\Models\Lesson;
use App\Models\post;
use App\Policies\homeworkPolicy;
use App\Policies\lessonPolicy;
use App\Policies\postPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Lesson::class => 
            lessonPolicy::class
        ,
        homework::class =>
            homeworkPolicy::class
        ,
        post::class =>
            postPolicy::class
        
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
