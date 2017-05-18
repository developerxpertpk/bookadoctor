<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsMedicalcenterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
       public function handle($request, Closure $next)

    {

        if(!Auth::check() || Auth::user()->role_id != '4'){

            return redirect()->route('/home');

        }

        return $next($request);

    }
}
