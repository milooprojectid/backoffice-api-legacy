<?php

Route::get('/', function () {
    return api_response('hey, you\'re not supposed to be here, piss off !');
});

Route::post('/login', 'AuthController@login');
Route::get('/profile', 'MainController@profile');

Route::group(['prefix' => 'home'], function (){
    Route::get('/summary', 'HomeController@summary');
    Route::get('/raw-chart', 'HomeController@raw_chart');
});

Route::group(['prefix' => 'schedule'], function (){
    Route::post('/crawl', 'ScheduleController@crawl');
    Route::post('/scrap', 'ScheduleController@scrap');
});

Route::group(['prefix' => 'sources'], function (){
    Route::get('/', 'SourceController@index');
    Route::post('/{id}/change-status', 'SourceController@changeStatus');
    Route::post('/{id}/push-job', 'SourceController@pushJob');
});

Route::group(['prefix' => 'links'], function (){
    Route::get('/', 'LinkController@index');
    Route::post('/{id}/dispatch', 'LinkController@dispatch_job');
});

Route::group(['prefix' => 'raws'], function (){
    Route::get('/', 'RawController@index');
});
