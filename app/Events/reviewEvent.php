<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class reviewEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user,
           $lesson;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $lesson_id)
    {
        $this->user = $user;
        $this->lesson = $lesson_id;
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
