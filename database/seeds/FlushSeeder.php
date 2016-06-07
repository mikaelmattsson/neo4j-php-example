<?php

use App\Models\User;
use Doctrine\Common\Collections\ArrayCollection;

class FlushSeeder extends AbstractNeo4jSeeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->getClient()->run(
            "MATCH (n)
            OPTIONAL MATCH (n)-[r]-()
            DELETE n,r"
        );
    }
}
