<?php

namespace App\Jobs;

use App\Models\Raw;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ScrapJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $raw;

    public function __construct(Raw $raw)
    {
        $this->raw = $raw;
    }

    public function handle()
    {
        $this->raw->setRunning();
        // Guzzle Python Server
        $this->raw->setCompleted();
    }
}
