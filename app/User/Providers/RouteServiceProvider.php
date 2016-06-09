<?php

namespace App\User\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'App\User\Http\Controllers';

    /**
     */
    public function register()
    {
        /* @var Application $app */
        $app = $this->app;

        $app->group(['namespace' => $this->namespace], function (Application $app) {
            $app->get('/', 'ListController@index');
        });
    }
}
