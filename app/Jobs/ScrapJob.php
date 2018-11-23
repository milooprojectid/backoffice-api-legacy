<?php

namespace App\Jobs;

use App\Models\Raw;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Exception;

class ScrapJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $raw;
    protected $baseUrl;
    protected $response;

    public function __construct(Raw $raw)
    {
        $this->raw = $raw;
    }

    public function handle()
    {
        $http = new Client(['base_uri' => env('SCRAPPER_URL')]);
        $this->raw->setRunning();

        try {
            $options = [
                'body' => json_encode([
                    'id' => $this->raw->_id
                ]),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'secret' => env('SCRAPPER_SECRET')
                ]
            ];
            $this->response = $http->post('/scrap', $options);
        }

        catch (Exception $e){
            $this->raw->setFailed();
        }

        finally {
            $code = (int) $this->response->getStatusCode();
            switch ($code) {
                case 201:
                    $this->raw->setCompleted();
                    break;
                default:
                    $this->raw->setFailed();
            }
        }
    }

    public function tags()
    {
        return ['scrap:'.$this->raw->id];
    }
}
