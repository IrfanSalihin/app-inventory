<?php

namespace App\Http\Middleware;

use Closure;

class CheckITAdmin
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
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the user has the 'IT' role and 'Admin' permission
            if (auth()->user()->role === 'IT' && auth()->user()->permission === 'Admin') {
                return $next($request);
            }
        }

        // Redirect to home or unauthorized page
        return redirect('/home');
    }
}
