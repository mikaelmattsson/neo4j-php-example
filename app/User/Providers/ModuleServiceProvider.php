<?php

namespace App\User\Providers;

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

        $app->register(RouteServiceProvider::class);
    }
}
