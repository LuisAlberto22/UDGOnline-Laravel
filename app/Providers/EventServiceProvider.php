<?php

namespace App\Providers;

use App\Events\homeworkCreatedEvent;
use App\Listeners\assignListener;
use App\Listeners\postHomeworkListener;
use App\Models\homework;
use App\Models\Lesson;
use App\Models\User;
use App\Observers\HomeworkObserver;
use App\Observers\lessonObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\uploadFileEvent;
use App\Listeners\postFileListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        homeworkCreatedEvent::class => [
            assignListener::class,
            postHomeworkListener::class,     
        ],
        
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Lesson::observe(lessonObserver::class);
        homework::observe(HomeworkObserver::class);
        User::observe(UserObserver::class);
    }
}
