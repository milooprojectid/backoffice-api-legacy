<?php

namespace App\Http\Controllers;

use App\Jobs\CrawlJob;
use App\Jobs\ScrapJob;
use App\models\Link;
use App\Models\Raw;

class ScheduleController extends Controller
{
    private $status;

    public function __construct()
    {
        $this->middleware('guard');
        $this->status = 1;
    }

    public function crawl(){
        $runningJob = Link::running()->count();
        $maxCrawlJob = 5;

        $allowedJob = $maxCrawlJob - $runningJob;

        if ($allowedJob > 0 && $this->status) {
            $links = Link::new()->take($allowedJob)->get();
            foreach ($links as $link){
                CrawlJob::dispatch($link);
            }
        }

        return api_response(count($links) . ' job(s) dispatched');
    }

    public function scrap(){
        $runningJob = Raw::running()->count();
        $maxScrapJob = 5;

        $allowedJob = $maxScrapJob - $runningJob;

        if ($allowedJob > 0 && $this->status) {
            $raws = Raw::new()->take($allowedJob)->get();
            foreach ($raws as $raw){
                ScrapJob::dispatch($raw);
            }
        }

        return api_response(count($raws) . ' job(s) dispatched');
    }
}
