<?php

namespace App\Events;

use App\Models\homework;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class homeworkCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $homework,
           $users;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(homework $homework ,User $users = null)
    {
        $this->homework = $homework;
        $this->users = $users;
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
