<?php

namespace TransIp\Models;

class DomainAction
{
    /**
     * The name of this DomainAction.
     *
     * @var string
     */
    public $name;

    /**
     * If this action has failed, this field will be true.
     *
     * @var boolean
     */
    public $hasFailed;

    /**
     * If this action has failed, this field will contain an descriptive message.
     *
     * @var string
     */
    public $message;
}