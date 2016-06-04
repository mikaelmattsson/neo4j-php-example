<?php

class DatabaseSeeder extends AbstractNeo4jSeeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call('UserSeeder');
    }
}
