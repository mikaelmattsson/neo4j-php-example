<?php

use App\Catalog\Model\Category;
use App\Core\Models\AbstractEntity;

class Product extends AbstractEntity
{
    /**
     * @OGM\Property(type="string")
     */
    protected $name;

    /**
     * @OGM\Relationship(type="HAS_PRODUCT", direction="INCOMING", targetEntity="Category", collection=true)
     */
    protected $categories;
}
