<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah ada auth token
        $token = $request->cookie('auth_token') ?? $request->header('Authorization');
        
        if (!$token) {
            // User belum login, tampilkan 404
            return response()->view('errors.404', [], 404);
        }

        return $next($request);
    }
}
