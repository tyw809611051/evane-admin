<?php

namespace App\Http\Middleware;

use Closure;

class CrossHttp
{
    public function handle($request, Closure $next) {
        $response = $next($request);
        $origin = $request->server('HTTP_ORIGIN') ? $request->server('HTTP_ORIGIN') : '';
        $allowOrigin = [
            'http://evanefront.com:7082',
        ];
//        if (in_array($origin,$allowOrigin)) {
//            $response->header('Access-Control-Allow-Origin', $origin);
            $response->header('Access-Control-Allow-Origin', "*");
            $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie,X-Requested-With, X-CSRF-TOKEN, Accept, Authorization, X-XSRF-TOKEN');
            $response->header('Access-Control-Expose-Headers', 'Authorization, authenticated');
            $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
            $response->header('Access-Control-Allow-Credentials', 'true');
//        }

        return $response;
    }
}