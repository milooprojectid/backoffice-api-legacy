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
            "active" => Source::all()->where('active', true)->count(),
            "all" => Source::all()->count()
        ];

        $link = [
            "done" => Link::all()->whereIn('status', [30, 35, 40])->count(),
            "all" => Link::all()->count()
        ];

        $raw = [
            "done" => Raw::all()->whereIn('status', [30, 40])->count(),
            "all" => Raw::all()->count()
        ];

        $corpus = [
            "all" => Corpus::all()->count()
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
