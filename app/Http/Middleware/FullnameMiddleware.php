<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Cache;

use Exception;

class FullnameMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response = json_decode($response->content(), true);

        $response['result']['fullname'] = $response['result']['fname'] . ' ' . $response['result']['lname'];

        return $response;
    }
}
