<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\models\Link;

class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    public function index(LinkRequest $request){
        $links = Link::paginate((int)$request->query('limit'));
        return api_response('links data retrieved', $links);
    }
}
