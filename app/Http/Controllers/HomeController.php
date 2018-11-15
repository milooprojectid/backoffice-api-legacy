<?php

namespace App\Http\Controllers;

use App\Models\Corpus;
use App\models\Link;
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
            "done" => Link::all()->where('status', 1)->count(),
            "all" => Link::all()->count()
        ];

        $raw = [
            "done" => Raw::all()->where('status', 1)->count(),
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

}
