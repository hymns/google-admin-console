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
        $response = $this->client->request('GET', 'orgunits');

        return json_decode((string)$response->getBody());
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

        $response = $this->client->request('POST', 'orgunits', $body, $params);
        return json_decode((string)$response->getBody());
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
        $response = $this->client->request('GET', 'orgunits/' . $orgUnitId);

        return json_decode((string)$response->getBody());
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
        $response = $this->client->request('PATCH', 'orgunits/' . $orgUnitId, $orgUnitInfo);
        return json_decode((string)$response->getBody());
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
        $response = $this->client->request('DELETE', 'orgunits/' . $orgUnitId);

        return json_decode((string)$response->getBody());
    }
}
