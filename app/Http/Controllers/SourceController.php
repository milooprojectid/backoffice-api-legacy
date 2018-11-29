<?php

namespace App\Http\Controllers;

use App\Http\Requests\SourceRequest;
use App\Models\Source;

class SourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    public function index(SourceRequest $request){
        $sources = (new Source())->newQuery();

        if ($request->has('search') && $request->input('search') != null){
            $sources->where('alias', 'like', '%'.$request->input('search').'%');
        }

        if ($request->has('status') && $request->input('status') != null){
            $sources->where('status', (int)$request->input('status'));
        }

        if ($request->has('all')){
            $sources = $sources->get();
        } else {
            $sources = $sources->paginate((int)$request->query('limit'));
        }

        return api_response('source datas retrieved', $sources);
    }

    public function changeStatus($id){
        $source = Source::find($id);
        $source->toggleStatus();
        return api_response('source status updated', $source);
    }
}
