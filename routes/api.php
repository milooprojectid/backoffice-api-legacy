<?php

Route::get('/', function () {
    return api_response('hey, you\'re not supposed to be here, piss off !');
});

Route::post('/login', 'AuthController@login');
Route::get('/profile', 'MainController@profile');
