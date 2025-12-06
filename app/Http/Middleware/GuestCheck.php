<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuestCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah ada auth token di cookie/session
        $token = $request->cookie('auth_token') ?? $request->header('Authorization');
        
        if ($token) {
            // User sudah login, redirect ke 404
            return response()->view('errors.404', [], 404);
        }

        return $next($request);
    }
}
