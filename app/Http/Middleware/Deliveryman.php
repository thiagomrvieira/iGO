<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Deliveryman
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
        #   Check if the user is a Delivery man 
        if(auth()->user()->is_deliveryman == 1){
            return $next($request);
        }
        
        #   Check if the request is from Web or Mobile (api) 
        if( $request->is('api/*')){
            #   Return for api
            return response()->json(['status'  => $status  ?? 'Forbidden',
                                     'message' => $message ?? 'Only delivery man can access the data!',
                                    ], $statusCode ?? 403); 
        }

        #   Return for web
        return redirect('/')->with('error',"Only delivery man can access!");
    }
}
