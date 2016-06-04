<?php

class UserSeeder extends AbstractNeo4jSeeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $em = $this->getManager();

        for ($i = 0; $i < 5; $i++) {
            $user = new \App\Models\User();
            
            $user->setName($faker->name);
            $user->setEmail($faker->email);
            $user->setAge($faker->numberBetween(5, 100));

            $em->persist($user);
            $em->flush();
        }
    }
}
