<?php

namespace TransIp\Models;

class VpsBackup
{
    /**
     * The backup id
     *
     * @var int
     */
    public $id = 0;

    /**
     * The backup creation date
     *
     * @var string
     */
    public $dateTimeCreate = '';

    /**
     * The backup disk size
     *
     * @var int
     */
    public $diskSize = 0;

    /**
     * The backup operatingSystem
     *
     * @var string
     */
    public $operatingSystem = '';
}