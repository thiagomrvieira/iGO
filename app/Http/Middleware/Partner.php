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
        #   Check if the user is a Partner
        if (auth()->user()->is_partner == 1 && auth()->user()->active == 1) {
            return $next($request);
        }

        #   Check if the request is from Web or Mobile (api) 
        if( $request->is('api/*')){
            #   Return for api
            return response()->json(['status'  => $status  ?? 'Forbidden',
                                     'message' => $message ?? 'Only Partner can access this data!',
                                    ], $statusCode ?? 403); 
        }

        #   Return for web
        return redirect()->route('partner.login')->withErrors(['Only Partner can access this area!']);

    }
}
