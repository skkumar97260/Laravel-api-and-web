<?php

namespace App\Http\Middleware;

use Closure;

class CheckSession // or auth.sanctum
{
public function handle($request, Closure $next)
{
    $authHeader = $request->header('Token'); // standard name

    if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
        return response()->json(['message' => 'Token header missing or malformed'], 401);
    }

    $token = str_replace('Bearer ', '', $authHeader);

    // Check if token exists in database (personal_access_tokens)
    $tokenModel = \Laravel\Sanctum\PersonalAccessToken::findToken($token);

    if (!$tokenModel || !$tokenModel->tokenable) {
        return response()->json(['message' => 'Invalid token'], 401);
    }

    // Attach user manually if needed
    $request->setUserResolver(fn () => $tokenModel->tokenable);

    return $next($request);
}

}
