<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Check if the user is authenticated and their role matches

        if (!auth()->check() || auth()->user()->role !== $role) {
            abort(403, 'Unauthorized action.'); // Return a 403 response if unauthorized
        }
        return $next($request);
    }
}
