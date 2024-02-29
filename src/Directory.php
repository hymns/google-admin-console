<?php

namespace Hymns\GoogleAdminConsole;

class Directory
{
    /**
     * @var RestClient
     */
    protected $client;

    public function __construct(RestClient $client)
    {
        $this->client = $client;
    }
}
