<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if ( ! Auth::user() ) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        // Check if user is admin
        if ( ! Auth::user()->isAdmin() ) {
            abort(403, 'Unauthorized action. Administrator access required.');
        }

        return $next($request);
    }
}
