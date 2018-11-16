<?php

Route::get('/', function () {
    return api_response('hey, you\'re not supposed to be here, piss off !');
});

Route::post('/login', 'AuthController@login');
Route::get('/profile', 'MainController@profile');


Route::group(['prefix' => 'home'], function (){
    Route::get('/summary', 'HomeController@summary');
});

Route::group(['prefix' => 'schedule'], function (){
    Route::post('/crawl', 'ScheduleController@crawl');
    Route::post('/scrap', 'ScheduleController@scrap');
});


Route::group(['prefix' => 'sources'], function (){
    Route::get('/all', 'SourceController@all');
});

Route::group(['prefix' => 'links'], function (){
    Route::get('/', 'LinkController@index');
});
