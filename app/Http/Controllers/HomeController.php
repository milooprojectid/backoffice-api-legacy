<?php

namespace App\Http\Controllers;

use App\Models\Corpus;
use App\models\Link;
use App\Models\Raw;
use App\Models\Source;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function source(){
        $source = [
            "active" => Source::all()->where('active', true)->count(),
            "all" => Source::all()->count()
        ];

        return api_response('source data retrieved', $source);
    }

    public function link(){
        $link = [
            "done" => Link::all()->where('status', 1)->count(),
            "all" => Link::all()->count()
        ];

        return api_response('link data retrieved', $link);
    }

    public function raw(){
        $raw = [
            "done" => Raw::all()->where('status', 1)->count(),
            "all" => Raw::all()->count()
        ];

        return api_response('raw data retrieved', $raw);
    }

    public function corpus(){
        $corpus = [
            "all" => Corpus::all()->count()
        ];

        return api_response('corpus data retrieved', $corpus);
    }
}
