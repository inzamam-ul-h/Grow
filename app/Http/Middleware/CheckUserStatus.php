<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Check if the user is authenticated
         if (Auth::check()) {
            // Check if the user's status is active
            if (Auth::user()->status !== '1') {
                // Log the user out
                Auth::logout();

                // Redirect to the login page with a status message
                return redirect('/login')->with('status', 'Your account is not active. Please contact the administrator.');
            }
        }

        return $next($request);
    }
}
