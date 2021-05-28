<?php

namespace App\Events;

use App\Models\homework;
use App\Models\Lesson;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class uploadHomework
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $homework_user,
            $user,
            $lesson;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(homework $homework,$user,Lesson $lesson)
    {
        $this->homework_user = $homework;
        $this->lesson = $lesson;
        $this->user = $user;
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
