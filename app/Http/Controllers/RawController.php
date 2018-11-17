<?php

namespace App\Http\Controllers;

use App\Http\Requests\RawRequest;
use App\Models\Raw;

class RawController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    public function index(RawRequest $request){
        $raws = (new Raw())->newQuery();

        if ($request->has('search') && $request->input('search') != null){
            $raws->where('content', 'like', '%'.$request->input('search').'%');
        }

        if ($request->has('status') && $request->input('status') != null){
            $raws->where('status', (int)$request->input('status'));
        }

        if ($request->has('source') && $request->input('source') != null){
            $raws->where('source', $request->input('source'));
        }

        $raws = $raws->paginate((int)$request->query('limit'));

        return api_response('all raw datass retrieved', $raws);
    }}
