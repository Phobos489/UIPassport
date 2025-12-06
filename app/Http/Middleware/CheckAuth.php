<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     * This middleware just passes through - authentication is handled client-side
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Let all requests through - authentication is handled by JavaScript
        return $next($request);
    }
}