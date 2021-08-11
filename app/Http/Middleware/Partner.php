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
        // dd($request->user());

        if (auth()->user()->is_partner == 1 && auth()->user()->active == 1) {
            return $next($request);
        }

        return redirect()->route('partner.login')->withErrors(['Only Partner can access this area!']);

    }
}
