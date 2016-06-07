<?php

use Illuminate\Database\Seeder;

abstract class AbstractNeo4jSeeder extends Seeder
{
    /**
     * @return \GraphAware\Neo4j\OGM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->container[\GraphAware\Neo4j\OGM\EntityManager::class];
    }

    /**
     * @return \GraphAware\Neo4j\Client\Client
     */
    public function getClient()
    {
        return $this->container[\GraphAware\Neo4j\Client\Client::class];
    }
}
