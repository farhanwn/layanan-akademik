<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isMahasiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika role user bukan mahasiswa
        if (auth()->user()->role !== 'mahasiswa') {
            abort(404); // Jika bukan mahasiswa, tampilkan error 404
        }
        return $next($request);
    }
}
