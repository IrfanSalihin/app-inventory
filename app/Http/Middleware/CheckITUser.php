<?php

namespace App\Http\Middleware;

use Closure;

class CheckITUser
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the user has the 'IT' role and 'User' permission
            if (auth()->user()->role === 'IT' && auth()->user()->permission === 'User') {
                return $next($request);
            }
        }

        // Redirect to home or unauthorized page
        return redirect('/');
    }
}
