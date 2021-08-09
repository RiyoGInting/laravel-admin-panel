<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Jwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        try {
            $jwt = $_COOKIE['access-token'];
            $payload = \Firebase\JWT\JWT::decode($jwt, env('JWT_SECRET'), ['HS256']);

            // get logged id
            $id = $payload->uid;
            $request->attributes->set('id', $id);
        } catch (\Throwable $th) {
            return response()->view('welcome');
        }


        return $next($request);
    }
}
