<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckQuery
{
    public function handle(Request $request, Closure $next, ...$fields)
    {
        foreach ($fields as $field) {
            if (!$request->query($field)) {
                return response()->json([
                    'error' => "Missing required query parameter: $field"
                ], 422);
            }
        }

        return $next($request);
    }
}

