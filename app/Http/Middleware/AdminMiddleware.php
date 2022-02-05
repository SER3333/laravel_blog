<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        //dd(auth()->user()->roles);
        if(auth()->user()->roles === null || auth()->user()->roles->title !== 'admin' ){
            abort(404);
        }
        return $next($request);
    }
}
