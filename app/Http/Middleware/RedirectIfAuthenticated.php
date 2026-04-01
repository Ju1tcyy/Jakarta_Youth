<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     * Redirect authenticated users away from guest-only routes (login, register).
     */
    public function handle(Request $request, Closure $next, string ...$guards): mixed
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                // Role-based redirect for authenticated users
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }

                if ($user->role === 'pendaftar') {
                    return redirect()->route('organisasi.dashboard');
                }

                if ($user->role === 'juri') {
                    return redirect()->route('juri.dashboard');
                }

                return redirect('/');
            }
        }

        return $next($request);
    }
}
