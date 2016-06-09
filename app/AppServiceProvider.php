<?php

namespace App;

use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        /* @var Application $app */
        $app = $this->app;

        $app->register(\App\Core\Providers\ModuleServiceProvider::class);
        $app->register(\App\User\Providers\ModuleServiceProvider::class);
    }
}
