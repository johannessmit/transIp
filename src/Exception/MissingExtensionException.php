<?php

namespace TransIp\Exception;

use Throwable;

/**
 * Class MissingExtensionException
 * @package TransIp\Exception
 */
class MissingExtensionException extends TransIpException
{
    /**
     * MissingExtensionException constructor.
     * @param string $extension
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($extension = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("PHP Extension: {$extension} missing", $code, $previous);
    }
}

;