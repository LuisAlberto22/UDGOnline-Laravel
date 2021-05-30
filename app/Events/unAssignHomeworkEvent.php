<?php

namespace App\Events;

use App\Models\Lesson;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class unAssignHomeworkEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $users,
           $lesson;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($users = [],Lesson $lesson)
    {
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
