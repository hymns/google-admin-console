<?php

namespace Hymns\GoogleAdminConsole\Directory;

use Hymns\GoogleAdminConsole\Directory;

class OrgUnit extends Directory
{
    /**
     * Retrieves a list of all organizational units for an account.

     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/orgunits/list
     * @return array
     */
    public function list()
    {
        return $this->client->request('GET', 'customer/{customerID}/orgunits');
    }

    /**
     * Adds an organizational unit.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/orgunits/insert
     * @param string $domainName
     * @param string $orgName
     * @param string $parentOrgUnitPath
     * @return array
     */
    public function create(string $domainName, string $orgName, string $parentOrgUnitPath = '/')
    {
        $params = [
            'domain'  => $domainName
        ];

        $body = [
            'name' => $orgName,
            'parentOrgUnitPath' => $parentOrgUnitPath
        ];

        return $this->client->request('POST', 'customer/{customerID}/orgunits', $body, $params);
    }

    /**
     * Retrieves an organizational unit.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/orgunits/get
     * @param string $orgUnitId
     * @return array
     */
    public function get(string $orgUnitId)
    {
        return $this->client->request('GET', 'customer/{customerID}/orgunits/' . $orgUnitId);

    }

    /**
     * Updates an organizational unit. This method supports patch semantics
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/orgunits/patch
     * @param string $orgUnitId
     * @param array $orgUnitInfo
     * @return array
     */
    public function update(string $orgUnitId, array $orgUnitInfo)
    {
        return $this->client->request('PATCH', 'customer/{customerID}/orgunits/' . $orgUnitId, $orgUnitInfo);
    }

    /**
     * Deletes a group.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/orgunits/delete
     * @param string $orgUnitId
     * @return array
     */
    public function delete(string $orgUnitId)
    {
        return $this->client->request('DELETE', 'customer/{customerID}/orgunits/' . $orgUnitId);
    }
}
