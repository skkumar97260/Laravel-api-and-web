<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Redirect to login if user not authenticated
            return redirect()->route('login')->withErrors(['You must be logged in.']);
        }

        return $next($request);
    }
}
