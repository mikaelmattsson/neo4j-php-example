<?php

use Illuminate\Database\Seeder;

abstract class AbstractNeo4jSeeder extends Seeder
{
    /**
     * @return \GraphAware\Neo4j\OGM\Manager
     */
    public function getManager()
    {
        return $this->container[\GraphAware\Neo4j\OGM\Manager::class];
    }
}
