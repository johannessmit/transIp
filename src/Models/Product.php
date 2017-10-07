<?php

namespace TransIp\Models;

class Product
{
    /**
     * Name of the product
     *
     * @var string
     */
    public $name;

    /**
     * Describes this product
     *
     * @var string
     */
    public $description;

    /**
     * Price in euros.
     *
     * @var float
     */
    public $price;

    /**
     * Price for renewing the product in euros.
     *
     * @var float
     */
    public $renewalPrice;
}