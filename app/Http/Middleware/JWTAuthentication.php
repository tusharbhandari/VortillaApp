<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * 
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization', '');
        
            if (Str::startsWith($header, 'Bearer ')) {
                $token = Str::substr($header, 7);
                $apy = JWTAuth::getPayload($token)->toArray();
                dd($apy);
            }else{
            	return response()->json([
                    "message" => "Unauthorize",
                ], 401);
            }
        return $next($request);
    }
}
