<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmailVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = $request->route('id');

        // Attempt to log in the user automatically
        if ($userId && Auth::loginUsingId($userId)) {
            // User successfully logged in, proceed with the request
            return $next($request);
        }

        // User login failed or id is not provided
        // You can add additional logic or redirect the user as needed
        return redirect()->route('login')->with('email_verification_intended', $request->url());
    
    }
}
