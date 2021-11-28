<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
         // check user if login and this user is admin or not
     
          if(Auth::user()->user_role == 'admin')
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
