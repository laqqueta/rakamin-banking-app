<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Jika pengguna sudah login, izinkan mereka untuk melanjutkan ke rute yang diminta
            return $next($request);
        }

        // Jika pengguna belum login, arahkan mereka kembali ke halaman login
        return redirect('login')->withErrors('Anda harus login terlebih dahulu.');
    
    }
}
