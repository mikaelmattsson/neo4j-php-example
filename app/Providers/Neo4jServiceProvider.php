<?php

namespace App\Providers;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GraphAware\Neo4j\Client\Client;
use GraphAware\Neo4j\Client\ClientBuilder;
use GraphAware\Neo4j\OGM\EntityManager;
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

        $app->singleton(Client::class, function (Application $app) {
            return ClientBuilder::create()
                ->addConnection('default', env('NEO4J_DEFAULT'))
                ->build();
        });

        $app->singleton(EntityManager::class, function (Application $app) {

            AnnotationRegistry::registerLoader([
                $app['autoloader'],
                'loadClass',
            ]);

            return new EntityManager($app[Client::class], storage_path('doctrine/cache'));
        });
    }
}
