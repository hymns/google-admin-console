<?php

namespace Hymns\GoogleAdminConsole\Directory;

use Hymns\GoogleAdminConsole\Directory;

class Group extends Directory
{
    /**
     * Retrieves all groups of a domain or of a user given a userKey (paginated).
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/groups/list
     * @param string $domainName
     * @return array
     */
    public function list(string $domainName)
    {
        $params = [
            'domain'  => $domainName
        ];

        return $this->client->request('GET', 'groups', [], $params);
    }

    /**
     * Creates a group.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/groups/insert
     * @param string $groupName
     * @param string $groupEmail
     * @return array
     */
    public function create(string $groupName, string $groupEmail)
    {
        $body = [
            'name' => $groupName,
            'email' => $groupEmail
        ];

        return $this->client->request('POST', 'groups', $body);
    }

    /**
     * Retrieves a group's properties.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/groups/get
     * @param string $groupId
     * @return array
     */
    public function get(string $groupId)
    {
        return $this->client->request('GET', 'groups/' . $groupId);
    }

    /**
     * Updates a group's properties. This method supports patch semantics.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/groups/patch
     * @param string $groupId
     * @param array $groupInfo
     * @return array
     */
    public function update(string $groupId, array $groupInfo)
    {
        return $this->client->request('PATCH', 'groups/' . $groupId, $groupInfo);
    }

    /**
     * Deletes a group.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/groups/delete
     * @param string $groupId
     * @return array
     */
    public function delete(string $groupId)
    {
        return $this->client->request('DELETE', 'groups/' . $groupId);
    }
}
