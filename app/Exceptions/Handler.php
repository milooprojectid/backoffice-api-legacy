<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Exception $exception)
    {
        parent::report($exception);
    }


    public function render($request, Exception $exception)
    {
        $isApiPath = explode('/',$request->path())[0] == 'api';

        if ($isApiPath){

            if ($exception instanceof ThrottleRequestsException){
                return api_response($exception->getMessage(), null, 429);
            }

            $stackTrace = env('APP_ENV') == 'local' ? $exception->getTrace() : null;
            return api_response($exception->getMessage(), $stackTrace,500);
        }

        return parent::render($request, $exception);
    }
}
