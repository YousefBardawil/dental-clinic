<?php

namespace App\Events;

use App\Models\Dentist;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WelcomeUser
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $dentists;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Dentist $dentists)
    {
        $this->dentists = $dentists;
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
