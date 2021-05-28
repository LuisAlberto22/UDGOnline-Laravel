<?php

namespace App\Events;

use App\Models\homework;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class reviewEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $users,
           $lesson,
           $homework;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($users = [], Lesson $lesson ,$homework)
    {
        $this->users = $users;
        $this->lesson = $lesson;
        $this->homework = $homework;
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
