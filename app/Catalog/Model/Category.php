<?php

namespace App\Catalog\Model;

class Category
{
    /**
     * @OGM\Property(type="string")
     */
    protected $name;

    /**
     * @OGM\Relationship(type="HAS_PRODUCT", direction="OUTGOING", targetEntity="User", collection=true)
     */
    protected $products;
}
