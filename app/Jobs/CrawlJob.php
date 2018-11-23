<?php

namespace App\Jobs;

use App\Models\Conf;
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
    protected $baseUrl;
    protected $response;

    public function __construct(Link $link)
    {
        $this->link = $link;
        $this->baseUrl = Conf::scrapperServer();
    }

    public function handle()
    {
        $http = new Client(['base_uri' => $this->baseUrl->value]);
        $this->link->setRunning();

        try {
            $this->response = $http->post('/crawl');
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
