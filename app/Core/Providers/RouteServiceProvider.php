<?php

namespace App\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'App\Core\Http\Controllers';

    /**
     */
    public function register()
    {
        /* @var Application $app */
        $app = $this->app;

        $app->group(['namespace' => $this->namespace], function (Application $app) {
            $app->get('/version', function () use ($app) {
                return $app->version();
            });
        });
    }
}
