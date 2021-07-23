<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Partner
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
        if(auth()->user()->is_partner == 1){
            return $next($request);
        }
        return redirect('/partner/login')->with('error',"Only Partner can access!");
    }
}
