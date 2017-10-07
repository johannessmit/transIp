<?php

namespace TransIp\Models;

/**
 * Class ApiSettings
 * @package TransIp\Models
 */
class ApiSettings
{
    const READ = 'readonly';
    const WRITE = 'readwrite';

    /**
     * The mode in which the API operates, can be either:
     *        readonly
     *        readwrite
     *
     * In readonly mode, no modifying functions can be called.
     * To make persistent changes, readwrite mode should be enabled.
     */
    private $mode = self::WRITE;

    /**
     * TransIP API endpoint to connect to.
     *
     * e.g.:
     *
     *        'api.transip.nl'
     *        'api.transip.be'
     *        'api.transip.eu'
     */
    private $endpoint = 'api.transip.nl';

    /**
     * Your login name on the TransIP website.
     *
     */
    private $login = '';

    /**
     * One of your private keys; these can be requested via your Controlpanel
     */
    private $privateKey = '';

    /**
     * ApiSettings constructor.
     * @param string $mode
     * @param string $endpoint
     * @param string $login
     * @param string $privateKey
     */
    public function __construct($mode, $login, $privateKey, $endpoint = null)
    {
        $this->setMode($mode);
        $this->setLogin($login);
        $this->setPrivateKey($privateKey);
        if (isset($endpoint)) {
            $this->setEndpoint($endpoint);
        }
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param mixed $mode
     * @return $this
     */
    public function setMode($mode) : ApiSettings
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param mixed $endpoint
     * @return $this
     */
    public function setEndpoint($endpoint) : ApiSettings
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;

        return $this;
    }

    /**
     * @param mixed $login
     * @return $this
     */
    public function setLogin($login) : ApiSettings
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param mixed $privateKey
     * @return $this
     */
    public function setPrivateKey($privateKey) : ApiSettings
    {
        $this->privateKey = $privateKey;

        return $this;
    }


}