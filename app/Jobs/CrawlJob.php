<?php

namespace App\Jobs;

use App\models\Link;
use GuzzleHttp\Client;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CrawlJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $link;
    protected $response;

    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    public function handle()
    {
        $http = new Client(['base_uri' => env('SCRAPPER_URL')]);
        $this->link->setRunning();

        try {
            $options = [
                'body' => json_encode([
                    'source' => $this->link->source,
                    'url' => $this->link->sourceRelation->url,
                    'target_url' => $this->link->url
                ]),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'secret' => env('SCRAPPER_SECRET')
                ]
            ];
            $this->response = $http->post('/crawl', $options);
        }

        catch (Exception $e){
            $this->link->setFailed();
        }

        finally {
            $code = (int) $this->response->getStatusCode();
            switch ($code) {
                case 201:
                    $this->link->setCompleted();
                    break;
                case 204:
                    $this->link->setInvalid();
                    break;
                default:
                    $this->link->setFailed();
            }
        }

    }

    public function tags()
    {
        return ['crawl:'.$this->link->id];
    }
}
