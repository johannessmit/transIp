<?php

namespace TransIp\Services;

use TransIp\Client;
use TransIp\Exception\MissingPrivateKeyException;
use TransIp\Models\ApiSettings;

abstract class Service extends \SoapClient
{
    /**
     * @var ApiSettings
     */
    protected $apiSettings;
    /**
     * @var string
     */
    protected $service = '';

    /**
     * @var array
     */
    protected $classMap = [];

    /**
     * @var array
     */
    protected $options = [];


    /**
     * Service constructor.
     * @param ApiSettings $apiSettings
     * @param array|null $parameters
     */
    public function __construct(ApiSettings $apiSettings, array $parameters = [])
    {
        $fullClassName = get_called_class();
        $className = substr($fullClassName, strrpos($fullClassName, '\\') + 1);

        $wsdl = "https://{$apiSettings->getEndpoint()}/wsdl/?service={$className}Service";

        $options = array_merge([
            'classmap' => $this->classMap,
            'encoding' => 'utf-8',
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS, // see http://bugs.php.net/bug.php?id=43338
            'trace' => false
        ], $this->options);

        parent::__construct($wsdl, $options);

        $this->__setCookie('login', $apiSettings->getLogin());
        $this->__setCookie('mode', $apiSettings->getMode());

        $this->apiSettings = $apiSettings;
    }

    public function __call($functionName, $arguments)
    {
        $timestamp = time();
        $nonce = uniqid('', true);

        $this->__setCookie('timestamp', $timestamp);
        $this->__setCookie('nonce', $nonce);
        $this->__setCookie('clientVersion', Client::API_VERSION);
        $this->__setCookie('signature', urlencode($this->sign($this->apiSettings->getPrivateKey(), [
            '__method' => $functionName,
            '__service' => $this->service,
            '__hostname' => $this->apiSettings->getEndpoint(),
            '__timestamp' => $timestamp,
            '__nonce' => $nonce
        ])));

        return parent::__call($functionName, $arguments);
    }

    /**
     * Calculates the hash to sign our request with based on the given parameters.
     *
     * @param $privateKey
     * @param  mixed $parameters The parameters to sign.
     * @return string Base64 encoded signing hash.
     * @throws MissingPrivateKeyException
     */
    protected function sign($privateKey, $parameters)
    {
        // Fixup our private key, copy-pasting the key might lead to whitespace faults
        if (!preg_match('/-----BEGIN (RSA )?PRIVATE KEY-----(.*)-----END (RSA )?PRIVATE KEY-----/si', $privateKey, $matches)) {
            throw new MissingPrivateKeyException('Could not find your private key, please supply your private key in the ApiSettings file. You can request a new private key in your TransIP Controlpanel.');
        }

        $key = $matches[2];
        $key = preg_replace('/\s*/s', '', $key);
        $key = chunk_split($key, 64, "\n");

        $key = "-----BEGIN PRIVATE KEY-----\n" . $key . "-----END PRIVATE KEY-----";

        $digest = $this->sha512Asn1($this->encodeParameters($parameters));
        if (!@openssl_private_encrypt($digest, $signature, $key))
            throw new MissingPrivateKeyException('Could not sign your request, please supply your private key in the ApiSettings file. You can request a new private key in your TransIP Controlpanel.');

        return base64_encode($signature);
    }

    /**
     * Creates a digest of the given data, with an asn1 header.
     *
     * @param  string $data The data to create a digest of.
     * @return string         The digest of the data, with asn1 header.
     */
    protected function sha512Asn1($data)
    {
        $digest = hash('sha512', $data, true);

        // this ASN1 header is sha512 specific
        $asn1 = chr(0x30) . chr(0x51);
        $asn1 .= chr(0x30) . chr(0x0d);
        $asn1 .= chr(0x06) . chr(0x09);
        $asn1 .= chr(0x60) . chr(0x86) . chr(0x48) . chr(0x01) . chr(0x65);
        $asn1 .= chr(0x03) . chr(0x04);
        $asn1 .= chr(0x02) . chr(0x03);
        $asn1 .= chr(0x05) . chr(0x00);
        $asn1 .= chr(0x04) . chr(0x40);
        $asn1 .= $digest;

        return $asn1;
    }

    /**
     * Encodes the given paramaters into a url encoded string based upon RFC 3986.
     *
     * @param  mixed $parameters The parameters to encode.
     * @param  string $keyPrefix Key prefix.
     * @return string               The given parameters encoded according to RFC 3986.
     */
    protected function encodeParameters($parameters, $keyPrefix = null)
    {
        if (!is_array($parameters) && !is_object($parameters))
            return urlencode($parameters);

        $encodedData = array();

        foreach ($parameters as $key => $value) {
            $encodedKey = is_null($keyPrefix)
                ? urlencode($key)
                : $keyPrefix . '[' . urlencode($key) . ']';

            if (is_array($value) || is_object($value)) {
                $encodedData[] = $this->encodeParameters($value, $encodedKey);
            } else {
                $encodedData[] = $encodedKey . '=' . urlencode($value);
            }
        }

        return implode('&', $encodedData);
    }
}