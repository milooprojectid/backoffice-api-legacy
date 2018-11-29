<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class JobDispatched implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $type;
    private $qty;

    public function __construct($type, $qty)
    {
        $this->type = $type;
        $this->qty = $qty;
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
            'type' => 'info',
            'title' => 'new ' . $this->type . ' job',
            'text' => $this->qty . ' ' . $this->type . ' job(s) dispatched'
        ];
    }
}
