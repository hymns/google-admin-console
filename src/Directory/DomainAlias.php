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
        $params = [
            'domain'  => $domainName
        ];

        return $this->client->request('GET', 'customer/{customerID}/domainaliases', [], $params);
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

        $params = [
            'domain' => $parentDomainName
        ];

        return $this->client->request('POST', 'customer/{customerID}/domainaliases', $body, $params);
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
        $params = [
            'domain' => $parentDomainName
        ];

        return $this->client->request('GET', 'customer/{customerID}/domainaliases/' . $domainName, [], $params);
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
        $params = [
            'domain' => $parentDomainName
        ];

        return $this->client->request('DELETE', 'customer/{customerID}/domainaliases/' . $domainName, [], $params);
    }
}
