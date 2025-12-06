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
        // Cek apakah ada auth token di cookie
        $token = $request->cookie('auth_token');
        $userRole = $request->cookie('user_role');
        
        if ($token && $userRole) {
            // User sudah login, redirect based on role
            if ($userRole === 'admin') {
                return redirect('/dashboard');
            } else {
                return redirect('/form');
            }
        }

        return $next($request);
    }
}