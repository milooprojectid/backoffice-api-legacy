<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Horizon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Horizon::auth(function () {
//            try {
//                JWT::decode(Session::get('token'), env('JWT_SECRET'), ['HS256']);
//            }
//            catch(\Exception $e) {
//                return false;
//            }
            return true;
        });
    }
}
