<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        // Check if user is logged in and if their role's permission matches the required one
        if (!Auth::check() || Auth::user()->role->permission !== $permission) {
            // If not, block access
            abort(403, 'UNAUTHORIZED ACTION.');
        }

        return $next($request);
    }
}