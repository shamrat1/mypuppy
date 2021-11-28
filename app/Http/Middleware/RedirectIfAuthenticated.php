<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->user_role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif(Auth::guard($guard)->check() && Auth::user()->user_role == 'booking'){
            return redirect()->route('booking.dashboard');
        } else {
            return $next($request);
        }
    }
}
