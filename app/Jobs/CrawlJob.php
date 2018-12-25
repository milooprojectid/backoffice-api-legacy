<?php

namespace App\Jobs;

use App\Events\JobCompleted;
use App\Events\JobFailed;
use App\Models\Link;
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

        try {
            $this->response = $http->post('/v1/crawl', [
                'body' => json_encode([
                    'source' => $this->link->source,
                    'url' => $this->link->sourceRelation->url,
                    'target_url' => $this->link->url
                ]),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'secret' => env('SCRAPPER_SECRET')
                ]
            ]);

            $code = (int) $this->response->getStatusCode();
            $body = json_decode($this->response->getBody(), true);

            switch ($code) {
                case 200:
                    $this->link->setCompleted();
                    event(new JobCompleted('link', $body['content']['new'], $body['content']['done']));
                    break;
                default:
                    $this->link->setFailed();
                    event(new JobFailed('crawl'));
            }

        }

        catch (Exception $e){
            $this->link->setFailed();
            event(new JobFailed('crawl'));
        }

    }

    public function tags()
    {
        return ['crawl:'.$this->link->id];
    }
}
