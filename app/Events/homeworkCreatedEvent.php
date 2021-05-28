<?php

namespace App\Events;

use App\Models\homework;
use App\Models\Lesson;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class homeworkCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $homework,
           $lesson,
           $users;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(homework $homework ,$users,Lesson $lesson = null)
    {
        $this->homework = $homework;
        $this->users = $users;
        $this->lesson = $lesson;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
