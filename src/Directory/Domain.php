<?php

namespace Hymns\GoogleAdminConsole\Directory;

use Hymns\GoogleAdminConsole\Directory;

class Domain extends Directory
{
    /**
     * Lists the domains of the customer.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/domains/list
     * @param string $domainName
     * @return array
     */
    public function list(string $domainName)
    {
        $parameters = [
            'domain'  => $domainName
        ];

        $response = $this->client->request('GET', 'customer/{customerID}/domains', [], $parameters);

        return json_decode((string)$response->getBody());
    }

    /**
     * Inserts a domain of the customer.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/domains/insert
     * @param string $domainName
     * @return array
     */
    public function create(string $domainName)
    {
        $body = [
            'domainName' => $domainName
        ];

        $response = $this->client->request('POST', 'customer/{customerID}/domains', $body);
        return json_decode((string)$response->getBody());
    }

    /**
     * Retrieves a domain of the customer.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/domains/get
     * @param string $domainName
     * @return array
     */
    public function get(string $domainName)
    {
        $response = $this->client->request('GET', 'customer/{customerID}/domains/' . $domainName);

        return json_decode((string)$response->getBody());
    }

    /**
     * Deletes a domain of the customer.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/domains/delete
     * @param string $domainName
     * @return array
     */
    public function delete(string $domainName)
    {
        $response = $this->client->request('DELETE', 'customer/{customerID}/domains/' . $domainName);

        return json_decode((string)$response->getBody());
    }
}
