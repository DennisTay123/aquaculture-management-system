<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|string[]  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // If the user is not logged in, redirect to login
            return redirect()->route('login');
        }

        // Check if the logged-in user's role is in the list of allowed roles
        if (!in_array(Auth::user()->role, $roles)) {
            // If not authorized, abort with a 403 error
            return abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
