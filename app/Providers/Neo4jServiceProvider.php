<?php

namespace App\Providers;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GraphAware\Neo4j\Client\ClientBuilder;
use GraphAware\Neo4j\OGM\Manager;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;

class Neo4jServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        /* @var Application $app */
        $app = $this->app;

        $app->singleton(ClientBuilder::class, function (Application $app) {
            return ClientBuilder::create()
                ->addConnection('default', env('NEO4J_DEFAULT'))
                ->build();
        });

        $app->singleton(Manager::class, function (Application $app) {

            AnnotationRegistry::registerLoader([
                $app['autoloader'],
                'loadClass',
            ]);

            return new Manager($app[ClientBuilder::class], storage_path('doctrine/cache'));
        });
    }
}
