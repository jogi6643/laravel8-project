<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authkey
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
        $token = $request->header('APP_KEY');
        if($token!='ABCDEFG')
        {
            return response()->json(['Messge'=>'App key Not Found'],401);
        }
        return $next($request);
    }
}
