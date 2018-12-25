<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class JobFailed implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function broadcastOn()
    {
        return new Channel('app');
    }

    public function broadcastAs(){
        return 'notification';
    }

    public function broadcastWith()
    {
        return [
            'type' => 'error',
            'title' => 'Whoops',
            'text' => 'a ' . $this->type . ' job failed'
        ];
    }
}
