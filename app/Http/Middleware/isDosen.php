<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isDosen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika role user bukan dosen
        if (auth()->user()->role !== 'dosen') {
            abort(404); // Jika bukan dosen, tampilkan error 404
        }
        return $next($request);
    }
}
