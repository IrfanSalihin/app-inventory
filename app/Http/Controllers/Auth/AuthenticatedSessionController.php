<?php

namespace App\Http\Controllers\Auth;

// app/Http/Controllers/Auth/AuthenticatedSessionController.php

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Check if the user has the role 'IT' and permission 'Admin'
        if (auth()->user()->role === 'IT' && auth()->user()->permission === 'Admin') {
            return redirect()->intended(RouteServiceProvider::ADMIN_DASHBOARD);
        }

        if (auth()->user()->role === 'IT' && auth()->user()->permission === 'User') {
            return redirect()->intended(RouteServiceProvider::ITUSER_DASHBOARD);
        }

        if (auth()->user()->role === 'GA' && auth()->user()->permission === 'User') {
            return redirect()->intended(RouteServiceProvider::GAUSER_DASHBOARD);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

