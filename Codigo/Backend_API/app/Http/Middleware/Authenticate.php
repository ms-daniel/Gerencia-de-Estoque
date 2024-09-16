<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{

    // protected function redirectTo($request){
    //     if(! $request->expectsJson()){
    //         return
    //     }
    // }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if($jwt = $request->cookie('auth_token')){
            $request->headers->set('Authorization', 'Bearer ' . $jwt);
            print_r('daniel, antes de ntrar: ' . $jwt);
        }

        return $next($request);
    }
}
