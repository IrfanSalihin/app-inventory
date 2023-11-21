<?php

// app/Http/Middleware/CheckUserRole.php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the user has any of the specified roles
            foreach ($roles as $role) {
                if (auth()->user()->role === $role) {
                    return $next($request);
                }
            }
        }

        // Redirect to home or unauthorized page
        return redirect('/home');
    }
}
