<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Str;


class Authenticate extends Middleware
{

    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        //dd($request->expectsJson());
        if (! $request->expectsJson()) {
            return "Unauthorized";
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $header = $request->header('Authorization', '');
        
            if (Str::startsWith($header, 'Bearer ')) {
                $token = Str::substr($header, 7);
            }else{
            	return response()->json([
                    "message" => "Unauthorize",
                ], 401);
            }

        return $next($request);
    }
}
