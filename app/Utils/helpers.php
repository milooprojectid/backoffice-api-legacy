<?php

function api_response($message, $content = null, $code = 200)
{
    return response()->json([
        'message' => $message,
        'code' => $code,
        'content' => $content
    ], $code);
}
