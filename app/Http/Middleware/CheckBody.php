<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBody
{
    public function handle(Request $request, Closure $next, ...$fields)
    {
        foreach ($fields as $field) {
            if (!$request->has($field)) {
                return response()->json([
                    'error' => "Missing required body parameter: $field"
                ], 422);
            }
        }

        return $next($request);
    }
}

