<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
   ->withMiddleware(function (Middleware $middleware): void {
    $middleware->alias([
        'basic.auth' => \App\Http\Middleware\BasicAuth::class,
        'check.body' => \App\Http\Middleware\CheckBody::class,
        'check.query' => \App\Http\Middleware\CheckQuery::class,
        'check.session' => \App\Http\Middleware\CheckSession::class,
        'auth' => \App\Http\Middleware\Authenticate::class
    ]);
})

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
