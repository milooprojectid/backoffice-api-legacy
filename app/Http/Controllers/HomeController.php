<?php

namespace App\Http\Controllers;

use App\Models\Corpus;
use App\Models\Link;
use App\Models\Raw;
use App\Models\Source;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    public function summary(){
        $source = [
            "active" => Source::where('status', 1)->count(),
            "all" => Source::count()
        ];

        $link = [
            "done" => Link::whereIn('status', [30, 35, 40])->count(),
            "all" => Link::count()
        ];

        $raw = [
            "done" => Raw::whereIn('status', [30, 40])->count(),
            "all" => Raw::count()
        ];

        $corpus = [
            "all" => Corpus::count()
        ];

        $datas = [
            'source' => $source,
            'link' => $link,
            'raw' => $raw,
            'corpus' => $corpus
        ];

        return api_response('summary data retrieved', $datas);
    }

    public function weeklyCrawlDispatched(){
        return api_response('chart data retrieved', []);
    }
}
