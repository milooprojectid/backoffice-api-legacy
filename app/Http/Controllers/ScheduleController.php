<?php

namespace App\Http\Controllers;

use App\Jobs\CrawlJob;
use App\Jobs\ScrapJob;
use App\Models\Conf;
use App\models\Link;
use App\Models\Raw;

class ScheduleController extends Controller
{
    private $status;

    public function __construct()
    {
        $this->middleware('guard');
    }

    public function crawl(){
        if (!Conf::crawlerStatus()) return api_response('crawler is inactive');

        $runningJob = Link::running()->count();
        $maxCrawlJob = (int)Conf::crawlerJobLimit()->value;
        $allowedJob = $maxCrawlJob - $runningJob;

        if ($allowedJob > 0) {
            $links = Link::new()->oldest()->take($allowedJob)->get();
            foreach ($links as $link){
                CrawlJob::dispatch($link)->onQueue('crawler');
            }
        }

        return api_response(count($links) . ' crawl job(s) dispatched');
    }

    public function scrap(){
        $runningJob = Raw::running()->count();
        $maxScrapJob = (int)Conf::scrapperJobLimit()->value;
        $allowedJob = $maxScrapJob - $runningJob;

        if ($allowedJob > 0 && $this->status) {
            $raws = Raw::new()->oldest()->take($allowedJob)->get();
            foreach ($raws as $raw){
                ScrapJob::dispatch($raw)->onQueue('scrapper');
            }
        }

        return api_response(count($raws) . ' scrap job(s) dispatched');
    }
}
