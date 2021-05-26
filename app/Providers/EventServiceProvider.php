<?php

namespace App\Providers;

use App\Events\homeworkCreatedEvent;
use App\Events\HomeworkDestroy;
use App\Events\reviewEvent;
use App\Events\unAssignHomeworkEvent;
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
use App\Events\uploadHomework;
use App\Listeners\DestroyFilesHomeworkEvent;
use App\Listeners\gradePoint;
use App\Listeners\homeworkTimeListener;
use App\Listeners\postFileListener;
use App\Models\file;
use App\Models\homework_user;
use App\Models\post;
use App\Observers\fileObserver;
use App\Observers\homework_userObserver;
use App\Observers\postObserver;

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
        reviewEvent::class => [
            gradePoint::class
        ],
        uploadHomework::class => [
            homeworkTimeListener::class,
            
        ],
        unAssignHomeworkEvent::class => [
            gradePoint::class,
            DestroyFilesHomeworkEvent::class
        ],
        HomeworkDestroy::class => [
            gradePoint::class,
            DestroyFilesHomeworkEvent::class
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        file::observe(fileObserver::class);
        post::observe(postObserver::class);
        Lesson::observe(lessonObserver::class);
        homework::observe(HomeworkObserver::class);
        User::observe(UserObserver::class);
    }
}
