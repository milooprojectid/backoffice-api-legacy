<?php

namespace App\Jobs;

use App\models\Link;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CrawlJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $link;

    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    public function handle()
    {
        $this->link->setRunning();
        // Guzzle Python Server
        $this->link->setCompleted();
    }
}
