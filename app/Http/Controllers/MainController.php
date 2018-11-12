<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct() {
        $this->middleware('jwt');
    }

    public function profile(Request $request){
        return api_response('user data successfully retrieved', $request->auth);
    }
}
