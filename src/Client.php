<?php

namespace Lojazone\MelhorEnvio;

use GuzzleHttp\Psr7\Request;

/**
 * Class Client
 * @package Lojazone\MelhorEnvio
 */
abstract class Client
{

    /**
     *
     */
    const ENVIRONMENT_PRODUCTION = 'production';
    /**
     *
     */
    const ENVIRONMENT_SANDBOX = 'sandbox';

    /**
     *
     */
    const API_ENDPOINT_PRODUCTION = 'https://melhorenvio.com.br/api/v2/';
    /**
     *
     */
    const API_ENDPOINT_SANDBOX = 'https://sandbox.melhorenvio.com.br/api/v2/';


    private $client;
    /**
     * @var string
     */
    private $environment;
    /**
     * @var
     */
    private $token;

    /**
     * Client constructor.
     * @param $token
     * @param string $environment
     */
    public function __construct($token, $environment = 'sandbox')
    {
        $this->token = $token;
        $this->environment = $environment;
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $environment == self::ENVIRONMENT_SANDBOX ? self::API_ENDPOINT_SANDBOX : self::API_ENDPOINT_PRODUCTION,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ]
        ]);
    }

    /**
     * @param $method
     * @param $uri
     * @param $options
     * @return array|mixed
     */
    public function request($method, $uri, $options = [])
    {
        $method = strtoupper($method);

        $response = $this->client->request($method, $uri, $options);

        $responseValue = json_decode($response->getBody(), true);
        if (empty($responseValue)) {
            return [];
        }

        return $responseValue;
    }
}