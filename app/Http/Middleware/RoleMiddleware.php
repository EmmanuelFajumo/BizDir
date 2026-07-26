<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Check if user is logged in
        if (!auth()->check()) {
            abort(403, 'You must be logged in.');
        }


        // Check user's role
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403, 'You do not have permission to access this resource.');
        }


        return $next($request);
    }
}
