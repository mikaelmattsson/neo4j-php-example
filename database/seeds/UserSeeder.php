<?php

use App\User\Models\User;
use Doctrine\Common\Collections\ArrayCollection;

class UserSeeder extends AbstractNeo4jSeeder
{

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $em = $this->getEntityManager();

        $users = [];

        for ($i = 0; $i < 5; $i++) {
            $users[] = $user = new User();

            $user->setName($faker->name);
            $user->setEmail($faker->email);
            $user->setAge($faker->numberBetween(20, 40));
        }

        foreach ($users as $user) {
            $user->setLoves($this->getRandomUsers($users, 1, $user));
            $user->setFriends($this->getRandomUsers($users, 3, $user));
            $em->persist($user);
        }

        $em->flush();
    }

    /**
     * @param User[] $users
     * @param int    $max
     * @param        $exclude
     *
     * @return \App\User\Models\User[]|ArrayCollection
     */
    public function getRandomUsers(array $users, int $max, User $exclude) : ArrayCollection
    {
        if (!$users) {
            return [];
        }

        $collection = new ArrayCollection();
        $randomKeys = array_rand($users, min($max, rand(1, count($users))));
        if (!is_array($randomKeys)) {
            $randomKeys = [$randomKeys];
        }

        foreach ($randomKeys as $key) {
            $collection->add($users[$key]);
        }

        $collection->removeElement($exclude);

        return $collection;
    }
}
