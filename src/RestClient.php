<?php

namespace Hymns\GoogleAdminConsole;

use Illuminate\Support\Facades\Config;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Hymns\GoogleAdminConsole\Directory\Domain;
use Hymns\GoogleAdminConsole\Directory\DomainAlias;
use Hymns\GoogleAdminConsole\Directory\Group;
use Hymns\GoogleAdminConsole\Directory\GroupAlias;
use Hymns\GoogleAdminConsole\Exception\RestException;

class RestClient
{
    private const BASE_URL = 'https://admin.googleapis.com/admin/directory/v1/';

    private $guzzleClient;
    private $customerID;

    public function __construct(string $accessToken)
    {
        $this->customerID = Config::get('services.google.customer_id');
        $this->guzzleClient = new \GuzzleHttp\Client([
            'headers'  => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    /**
     * @param string     $method
     * @param string     $uri
     * @param array|null $bodyParameters
     * @param array|null $formParameters
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws Exception\ClientException
     */
    public function request(string $method, string $uri, array $bodyParameters = null, array $formParameters = null)
    {
        if (\is_array($bodyParameters)) {
            $parameters = [
                \GuzzleHttp\RequestOptions::BODY => json_encode($bodyParameters)
            ];
        } else {
            $parameters = array();
        }

        $responseUri = str_replace('{customerID}', $this->customerID, $uri);

        if (\is_array($formParameters)) {
            $params = array();

            foreach ($formParameters as $key => $value) {
                $params[] = $key . '=' . $value;
            }

            if ($params !== array()) {
                $responseUri .= '?' . implode('&', $params);
            }
        }

        try {
            return $this->guzzleClient->request($method, self::BASE_URL . $responseUri, $parameters);
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody());
            throw new RestException($response->message, $e->getCode(), $e);
        } catch (GuzzleException $e) {
            throw new RestException($e->getResponse(), $e->getCode(), $e);
        }
    }

    /**
     * Domain instance model
     *
     * @return mixed
     */
    public function domain(): Domain
    {
        return new Domain($this);
    }

    /**
     * DomainAlias instance model
     *
     * @return mixed
     */
    public function domainAlias(): DomainAlias
    {
        return new DomainAlias($this);
    }

    /**
     * Group instance model
     *
     * @return mixed
     */
    public function group(): Group
    {
        return new Group($this);
    }

    /**
     * Group Alias instance model
     *
     * @return mixed
     */
    public function groupAlias(): GroupAlias
    {
        return new GroupAlias($this);
    }
}
