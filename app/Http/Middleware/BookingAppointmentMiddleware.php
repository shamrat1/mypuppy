<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingAppointmentMiddleware
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
       if(Auth::user()->user_role == 'booking')
        {
          //if this user really admin then redirect to their home
            return $next($request);
        }    
        else
        {
          return redirect('/'); // if this is not admin the redirect to welcome page
        }
    }
}
