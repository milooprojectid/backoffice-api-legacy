<?php

use Firebase\JWT\JWT;

Horizon::auth(function ($request) {

//    try {
//        JWT::decode($request->query('auth'), env('JWT_SECRET'), ['HS256']);
//    }
//    catch(Exception $e) {
//        return false;
//    }

    return true;
});

Route::get('/{any}', function(){
    return view('root');
})->where('any', '.*');
