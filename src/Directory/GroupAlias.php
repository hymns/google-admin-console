<?php

namespace Hymns\GoogleAdminConsole\Directory;

use Hymns\GoogleAdminConsole\Directory;

class GroupAlias extends Directory
{
    /**
     * Lists all aliases for a group.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/groups.aliases/list
     * @param string $groupId
     * @return array
     */
    public function list(string $groupId)
    {
        return $this->client->request('GET', 'groups/' . $groupId . '/aliases');
    }

    /**
     * Adds an alias for the group.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/groups.aliases/insert
     * @param string $groupId
     * @param string $primaryEmail
     * @param string $alias
     * @return array
     */
    public function create(string $groupId, string $primaryEmail, string $alias)
    {
        $body = [
            'primaryEmail' => $primaryEmail,
            'alias' => $alias
        ];

        return $this->client->request('POST', 'groups/' . $groupId . '/domainaliases', $body);
    }

    /**
     * Removes an alias.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/groups.aliases/delete
     * @param string $groupId
     * @param string $alias
     * @return array
     */
    public function delete(string $groupId, string $alias)
    {
        return $this->client->request('DELETE', 'groups/' . $groupId. '/domainaliases/' . $alias);
    }
}
