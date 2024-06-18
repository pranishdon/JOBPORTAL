<?php

use App\Http\Middleware\AdminDashboard;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Dashboard;
use App\Http\Middleware\User;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Routing\Router;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        function (Router $router) {
            $router->middleware('web')
            ->group(base_path('routes/web.php'));

        $router->middleware('web')
            ->group(base_path('routes/login.php'));

        $router->middleware('api')
            ->group(base_path('routes/api.php'));

        $router->middleware('console')
            ->group(base_path('routes/console.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'dashboard' => Dashboard::class,
            'auth' => Authenticate::class,
            'userlogin' => User::class,
            'AdminIs'=>AdminDashboard::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Define exception handling configuration if needed
    })
    ->withEvents([
        __DIR__.'/../app/Listeners',
    ])
    ->create();
