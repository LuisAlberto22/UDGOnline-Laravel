<?php

namespace App\Events;

use App\Models\homework;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
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
    public function __construct(homework $homework ,$users)
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
