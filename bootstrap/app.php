<?php
 

use App\Http\Middleware\AdminMiddleware; 
use App\Http\Middleware\EnsureStudent; 
use App\Http\Middleware\PreventBackHistory; 
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
        $middleware->alias([
 
            'preventBackHistory' => PreventBackHistory::class,
            'role' => EnsureStudent::class,
            'IsAdmin' => IsAdmin::class,
            'role' => AdminMiddleware::class,
        ]);
         
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();