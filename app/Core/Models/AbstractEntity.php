<?php

namespace App\Core\Models;

use Exception;
use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @method static setId($value)
 * @method int getId()
 */
abstract class AbstractEntity
{
    /**
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * AbstractEntity constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {
        foreach ($properties as $key => $value) {
            $method = 'set'.ucfirst($key);
            $this->$method($value);
        }
    }

    /**
     * @param string $methodName
     * @param array  $args
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function __call($methodName, $args)
    {
        $action = substr($methodName, 0, 3);
        if ($action === 'get') {
            $result = $this->get(lcfirst(substr($methodName, 3)));
            if ($result === null && isset($args[0])) {
                return $args[0];
            }

            return $result;
        }

        if ($action === 'set') {
            $this->set(lcfirst(substr($methodName, 3)), $args[0]);

            return $this;
        }

        throw new Exception("Method ”$methodName” does not exists");
    }

    /**
     * @param $property
     * @param null $default
     *
     * @return mixed
     */
    public function get($property, $default = null)
    {
        return isset($this->$property) ? $this->$property : $default;
    }

    /**
     * @param $property
     * @param $value
     *
     * @return $this
     */
    private function set($property, $value)
    {
        $this->$property = $value;

        return $this;
    }
}
