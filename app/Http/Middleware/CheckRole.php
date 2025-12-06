<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Get user role from cookie/session
        $userRole = $request->cookie('user_role');
        
        if (!$userRole || !in_array($userRole, $roles)) {
            // User doesn't have required role, show 404
            return response()->view('errors.404', [], 404);
        }

        return $next($request);
    }
}
