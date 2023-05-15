<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutoLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // $user = Auth::user();
            $lastActivity = session('lastActivityTime');
            $currentTime = time();
        
            if (($currentTime - $lastActivity) > 600) {
                Auth::logout();
                session()->flush();
                return redirect('/login')->with('status', 'Anda telah logout karena tidak melakukan aktivitas dalam 10 menit');
            }
        
            session(['lastActivityTime' => time()]);
        }

        return $next($request);
    }
}
