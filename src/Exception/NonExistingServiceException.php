<?php

namespace TransIp\Exception;

use Throwable;

class NonExistingServiceException extends TransIpException
{
    /**
     * NonExistingServiceException constructor.
     * @param string $service
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($service = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("Service: {$service} doesn't exist", $code, $previous);
    }
}