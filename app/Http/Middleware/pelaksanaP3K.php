<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pelaksanaP3K
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == 'supervisor') {
            return redirect()->intended('pilih');
        }

        if (Auth::user()->role == 'petugasapar') {
            return redirect()->intended('dashboard');
        }

        if (Auth::user()->role == 'petugasp3k') {

            return $next($request);
        }
        if (Auth::user()->role == 'superadmin') {
            return redirect()->intended('dashboard');
        }
    }
}
