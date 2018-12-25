<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class Notify implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $channel;
    private $topic;
    private $title;
    private $message;
    private $type;

    public function __construct($channel, $topic, $title, $message, $type = 'info')
    {
        $this->channel = $channel;
        $this->topic = $topic;
        $this->title = $title;
        $this->message = $message;
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
            'type' => $this->type,
            'title' => $this->title,
            'text' => $this->message
        ];
    }
}
