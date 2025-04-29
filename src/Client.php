<?php

namespace Wotvenxie\TruckersHubApiClient;

use GuzzleHttp\Client as Guzzle;
use Illuminate\Support\Facades\Http;

class Client
{
    protected $token;
    protected $baseUrl = 'https://api.truckershub.in/v1';

    public function __construct(array $config)
    {
        $this->token = $config['token'] ?? null;
    }

    protected function request($method, $uri, $options = [])
    {
        return Http::withToken($this->token)->$method("{$this->baseUrl}/{$uri}", $options)->json();
    }

    public function driver()
    {
        return new DriverEndpoint($this);
    }

    public function deliveries()
    {
        return new DeliveriesEndpoint($this);
    }

    public function getToken()
    {
        return $this->token;
    }
}
