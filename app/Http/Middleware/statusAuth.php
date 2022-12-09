<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class statusAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // check if user is authenticated
        if (!auth()->check()) {
            // redirect to login page
            return redirect()->route('login');
        }
        // check if user status active or not
        if (auth()->user()->status == 'active') {
            return $next($request);
        } else {
            auth()->logout();
            return redirect()->route('login');
        }
    }
}
