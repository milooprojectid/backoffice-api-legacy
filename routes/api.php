<?php

Route::get('/', function () {
    return api_response('hey, you\'re not supposed to be here, piss off !');
});

Route::post('/login', 'AuthController@login');
Route::get('/profile', 'MainController@profile');


Route::group(['prefix' => 'home'], function (){
    Route::get('/source', 'HomeController@source');
    Route::get('/link', 'HomeController@link');
    Route::get('/raw', 'HomeController@raw');
    Route::get('/corpus', 'HomeController@corpus');
});

Route::group(['prefix' => 'schedule'], function (){
    Route::get('/crawl', 'ScheduleController@crawl');
    Route::get('/scrap', 'ScheduleController@scrap');
});


