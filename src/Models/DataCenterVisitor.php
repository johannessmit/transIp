<?php

namespace TransIp\Models;

class DataCenterVisitor
{
    /**
     * The name of the visitor
     *
     * @var string
     */
    public $name;

    /**
     * The reservation number of the visitor.
     *
     * @var string
     */
    public $reservationNumber;

    /**
     * The accesscode of the visitor.
     *
     * @var string
     */
    public $accessCode;

    /**
     * true iff this visitor been registered before at the datacenter. if true, does not need the accesscode
     *
     * @var boolean
     */
    public $hasBeenRegisteredBefore;
}