<?php

namespace TransIp;

use TransIp\Exception\MissingExtensionException;
use TransIp\Exception\NonExistingServiceException;
use TransIp\Models\ApiSettings;
use TransIp\Services\Service;

/**
 * Class Client
 * @package TransIp
 */
class Client
{
    /**
     * Current API Version
     * @var string
     */
    const API_VERSION = '5.5';

    /**
     * @var ApiSettings
     */
    private $apiSettings;

    /**
     * @var array
     */
    private $services = [
        'vps' => null,
        'colocation' => null,
        'domain' => null,
        'forward' => null,
        'haip' => null,
        'webhosting' => null
    ];

    /**
     * Client constructor.
     * @param $login
     * @param $privateKey
     * @param string $mode
     * @throws MissingExtensionException
     */
    public function __construct($login, $privateKey, $mode = ApiSettings::READ)
    {
        $extensions = get_loaded_extensions();

        if (!$this->isSoapClientEnabled($extensions)) {
            throw new MissingExtensionException('soap');
        } elseif (!$this->isSslEnabled($extensions)) {
            throw new MissingExtensionException('openssl');
        }

        $this->initApiSettings($login, $privateKey, $mode);
    }

    /**
     * @param $name
     * @return mixed
     * @throws NonExistingServiceException
     */
    public function service($name)
    {
        $services = &$this->services;
        if (!array_key_exists($name, $services)) {
            throw new NonExistingServiceException($name);
        }

        if (!$services[$name]) {
            $services[$name] = $this->createService($name);
        }

        return $services[$name];
    }

    /**
     * @param $login
     * @param $privateKey
     * @param $mode
     */
    private function initApiSettings($login, $privateKey, $mode)
    {
        $this->apiSettings = new ApiSettings($mode, $login, $privateKey);
    }

    /**
     * @param $extensions
     * @return bool
     */
    private function isSoapClientEnabled($extensions): bool
    {
        return class_exists('SoapClient') || in_array('soap', $extensions);
    }

    /**
     * @param $extensions
     * @return bool
     */
    private function isSslEnabled($extensions): bool
    {
        return in_array('openssl', $extensions);
    }

    /**
     * Create service if not instantiated yet
     *
     * @param $name
     * @return Service
     * @throws NonExistingServiceException
     */
    private function createService($name) : Service
    {
        $className = 'TransIp\\Services\\' . ucfirst($name);

        if (class_exists($className)) {
            return new $className($this->apiSettings);
        } else {
            throw new NonExistingServiceException($name);
        }
    }
}