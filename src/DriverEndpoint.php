<?php

namespace Wotvenxie\TruckersHubApiClient;

class DeliveriesEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function all()
    {
        return $this->client->request('get', 'jobs');
    }
}
