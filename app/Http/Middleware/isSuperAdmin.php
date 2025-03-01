<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika role user bukan superadmin
        if (!auth()->check() || auth()->user()->role !== 'superadmin') {
            abort(403, 'Unauthorized'); // Akses ditolak jika bukan superadmin
        }
        return $next($request);
    }
}
