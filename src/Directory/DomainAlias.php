<?php

namespace Hymns\GoogleAdminConsole\Directory;

use Hymns\GoogleAdminConsole\Directory;

class DomainAlias extends Directory
{
    /**
     * Lists the domains of the customer.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/domainAliases/list
     * @param string $domainName
     * @return array
     */
    public function list(string $domainName)
    {
        $parameters = [
            'domain'  => $domainName
        ];

        $response = $this->client->request('GET', 'customer/{customerID}/domainaliases', [], $parameters);

        return json_decode((string)$response->getBody());
    }

    /**
     * Inserts a domain of the customer.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/domainAliases/insert
     * @param string $domainName
     * @param string $parentDomainName
     * @return array
     */
    public function create(string $domainName, string $parentDomainName)
    {
        $body = [
            'domainAliasName' => $domainName,
            'parentDomainName' => $parentDomainName
        ];

        $parameters = [
            'domain' => $parentDomainName
        ];

        $response = $this->client->request('POST', 'customer/{customerID}/domainaliases', $body, $parameters);
        return json_decode((string)$response->getBody());
    }

    /**
     * Retrieves a domain of the customer.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/domainAliases/get
     * @param string $domainName
     * @param string $parentDomainName
     * @return array
     */
    public function get(string $domainName, string $parentDomainName)
    {
        $parameters = [
            'domain' => $parentDomainName
        ];

        $response = $this->client->request('GET', 'customer/{customerID}/domainaliases/' . $domainName, [], $parameters);

        return json_decode((string)$response->getBody());
    }

    /**
     * Deletes a domain of the customer.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/domainAliases/delete
     * @param string $domainName
     * @param string $parentDomainName
     * @return array
     */
    public function delete(string $domainName, string $parentDomainName)
    {
        $parameters = [
            'domain' => $parentDomainName
        ];

        $response = $this->client->request('DELETE', 'customer/{customerID}/domainaliases/' . $domainName, [], $parameters);

        return json_decode((string)$response->getBody());
    }
}
