<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    
    /**
     * @return void
     */
    public function register()
    {
        /* @var Application $app */
        $app = $this->app;

        $app->group(['namespace' => $this->namespace], function (Application $app) {
            $app->get('/', 'ExampleController@index');

            $app->get('/version', function () use ($app) {
                return $app->version();
            });
        });
    }
}
