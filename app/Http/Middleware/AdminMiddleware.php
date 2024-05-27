<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // If the user is not authenticated or doesn't have the 'administrator' role,
        // abort the request and return a 403 error.
        if (!Auth::check() || Auth::user()->role_id != 1) {
            abort(403, 'Unauthorized action.');
        }

        // If the user is authenticated and has the 'administrator' role,
        // allow the request to continue to the next middleware or controller.
        return $next($request);
    }
}
