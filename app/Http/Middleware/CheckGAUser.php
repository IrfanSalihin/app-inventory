<?php

namespace App\Http\Middleware;

use Closure;

class CheckGAUser
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the user has the 'GA' role and 'User' permission
            if (auth()->user()->role === 'GA' && auth()->user()->permission === 'User') {
                return $next($request);
            }
        }

        // Redirect to home or unauthorized page
        return redirect('/');
    }
}
