<?php

namespace Lojazone\MelhorEnvio\Models;

use Lojazone\MelhorEnvio\Client;

abstract class Model
{
    protected $client;


    final public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $name
     * @return mixed
     */
    final public function __get($name): ?object
    {
        return $this->client->$name;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}