<?php

namespace App\Http\Controllers;

use App\Jobs\CrawlJob;
use App\models\Link;

class ScheduleController extends Controller
{
    private $status;
    private $maxCrawlJob;
    private $maxScrapJob;

    public function __construct()
    {
        $this->middleware('guard');
        $this->status = 1;
        $this->maxCrawlJob = 5;
        $this->maxScrapJob = 5;
    }

    public function crawl(){
        $runningJob = Link::running()->count();
        $allowedJob = $this->maxCrawlJob - $runningJob;

        if ($allowedJob > 0 && $this->status) {
            $links = Link::new()->take($allowedJob)->get();
            foreach ($links as $link){
                CrawlJob::dispatch($link);
            }
        }

        return api_response(count($links) . ' job(s) dispatched');
    }

    public function scrap(){

    }
}
