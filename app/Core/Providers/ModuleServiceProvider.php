<?php

namespace App\Core\Providers;

use App\Core\Providers;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        /* @var Application $app */
        $app = $this->app;

        /*
        |--------------------------------------------------------------------------
        | Register Container Bindings
        |--------------------------------------------------------------------------
        |
        | Now we will register a few bindings in the service container. We will
        | register the exception handler and the console kernel. You may add
        | your own bindings here if you like or you can make another file.
        |
        */

        $app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            \App\Core\Exceptions\Handler::class
        );

        $app->singleton(
            \Illuminate\Contracts\Console\Kernel::class,
            \App\Core\Console\Kernel::class
        );

        /*
        |--------------------------------------------------------------------------
        | Register Middleware
        |--------------------------------------------------------------------------
        |
        | Next, we will register the middleware with the application. These can
        | be global middleware that run before and after each request into a
        | route or middleware that'll be assigned to some specific routes.
        |
        */

        // $app->middleware([
        //    App\Http\Middleware\ExampleMiddleware::class
        // ]);

        // $app->routeMiddleware([
        //     'auth' => App\Http\Middleware\Authenticate::class,
        // ]);

        /*
        |--------------------------------------------------------------------------
        | Register Service Providers
        |--------------------------------------------------------------------------
        |
        | Here we will register all of the application's service providers which
        | are used to bind services into the container. Service providers are
        | totally optional, so you are not required to uncomment this line.
        |
        */

        //$app->register(Providers\AuthServiceProvider::class);
        //$app->register(Providers\EventServiceProvider::class);

        $app->register(Providers\RouteServiceProvider::class);
        $app->register(Providers\Neo4jServiceProvider::class);
    }
}
