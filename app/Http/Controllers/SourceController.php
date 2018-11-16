<?php

namespace App\Http\Controllers;

use App\Models\Source;
//use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    public function all(){
        return api_response('all source data retrieved', Source::all());
    }
}
