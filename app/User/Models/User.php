<?php

namespace App\User\Models;

use App\Core\Models\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;
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
 * @method static setLoves($value)
 * @method ArrayCollection|User[] getLoves()
 * @method static setLovedBy($value)
 * @method ArrayCollection|User[] getLovedBy()
 * @method static setFriends($value)
 * @method ArrayCollection|User[] getFriends()
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

    /**
     * @OGM\Relationship(type="IN_LOVE_WITH", direction="OUTGOING", targetEntity="User", collection=true)
     */
    protected $loves;

    /**
     * @OGM\Relationship(type="IN_LOVE_WITH", direction="INCOMING", targetEntity="User", collection=true)
     */
    protected $lovedBy;

    /**
     * @OGM\Relationship(type="FRIENDS_WITH", direction="BOTH", targetEntity="User", collection=true)
     */
    protected $friends;
}
