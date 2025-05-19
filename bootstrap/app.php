<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // 1) give Laravel a short name (alias) that points to your class
        $middleware->alias([
            'setlocale' => \App\Http\Middleware\SetLocale::class,
        ]);

        // 2) OPTIONAL: make it run automatically on every “web” route
        //    If you prefer to add it route-by-route, delete this line.
        $middleware->appendToGroup('web', \App\Http\Middleware\SetLocale::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
