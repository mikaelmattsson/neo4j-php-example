<?php

namespace App\Models;

use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @OGM\Node(label="User")
 *
 * @method static setName($value)
 * @method string getName()
 * @method static setAge($value)
 * @method int getAge()
 * @method static setEmail($value)
 * @method string getEmail()
 */
class User extends AbstractEntity
{
    /**
     * @OGM\Property(type="string")
     */
    protected $name;

    /**
     * @OGM\Property(type="int")
     */
    protected $age;

    /**
     * @OGM\Property(type="string")
     */
    protected $email;
}
