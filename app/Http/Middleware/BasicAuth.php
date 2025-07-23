<?php

namespace App\Http\Middleware;

use Closure;

class BasicAuth
{
    public function handle($request, Closure $next)
    {
        $username = 'sk';
        $password = 'Sk@279200';
     
        if ($request->getUser() !== $username || $request->getPassword() !== $password) {
            return response()->json(['message' => 'Unauthorized Basic Auth'], 401);
        }

        return $next($request);
    }
}

