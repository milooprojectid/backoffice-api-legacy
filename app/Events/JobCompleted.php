<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class JobCompleted implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $type;
    private $all;
    private $done;

    public function __construct($type, $all, $done)
    {
        $this->type = $type;
        $this->all = $all;
        $this->done = $done;
    }

    public function broadcastOn()
    {
        return new Channel('home');
    }

    public function broadcastAs(){
        return $this->type.'-changed';
    }

    public function broadcastWith()
    {
        return [
            'all' => $this->all,
            'done' => $this->done
        ];
    }
}
