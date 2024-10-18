<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfRegistered
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the session has the 'registered' flag
        if (session()->has('registered')) {
            session()->forget('registered'); // Clear the flag to prevent repeated redirects
            return redirect('/'); // Redirect to the welcome page
        }

        // Continue processing the request
        return $next($request);
    }
}