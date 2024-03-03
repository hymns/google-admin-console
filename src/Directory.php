<?php

namespace Hymns\GoogleAdminConsole;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\ClientException;

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
