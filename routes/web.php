<?php

Route::get('/{any}', function(){
    return view('root');
})->where('any', '.*');
