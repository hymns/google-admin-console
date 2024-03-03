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
        $params = [
            'domain'  => $domainName
        ];

        return $this->client->request('GET', 'customer/{customerID}/domains', [], $params);
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

        return $this->client->request('POST', 'customer/{customerID}/domains', $body);
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
        return $this->client->request('GET', 'customer/{customerID}/domains/' . $domainName);
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
        return $this->client->request('DELETE', 'customer/{customerID}/domains/' . $domainName);
    }
}
