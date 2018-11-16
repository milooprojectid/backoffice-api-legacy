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
        $links = (new Link())->newQuery();

        if ($request->has('search') && $request->input('search') != null){
            $links->where('url', 'like', '%'.$request->input('search').'%');
        }

        if ($request->has('status') && $request->input('status') != null){
            $links->where('status', (int)$request->input('status'));
        }

        if ($request->has('source') && $request->input('source') != null){
            $links->where('source', $request->input('source'));
        }

        $links = $links->paginate((int)$request->query('limit'));

        return api_response('links data retrieved', $links);
    }
}
