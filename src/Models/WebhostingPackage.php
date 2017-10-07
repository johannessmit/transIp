<?php

namespace TransIp\Models;

class WebhostingPackage
{
    /**
     * Name of the webhosting package
     *
     * @var string
     */
    public $name;

    /**
     * Describes this webhosting package
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
     * Price for renewing the package in euros.
     *
     * @var float
     */
    public $renewalPrice;
}