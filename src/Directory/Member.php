<?php

namespace Hymns\GoogleAdminConsole\Directory;

use Hymns\GoogleAdminConsole\Directory;

class Member extends Directory
{
    /**
     * Retrieves a paginated list of all members in a group.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/members/list
     * @param string $groupId
     * @return array
     */
    public function list(string $groupId)
    {
        return $this->client->request('GET', 'groups/' . $groupId . '/members');
    }

    /**
     * Adds a user to the specified group.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/members/insert
     * @param string $groupId
     * @param string $userId
     * @return array
     */
    public function create(string $groupId, string $userId)
    {
        $body = [
            'id' => $userId
        ];

        return $this->client->request('POST', 'groups/' . $groupId . '/members', $body);
    }

    /**
     * Retrieves a group member's properties.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/members/get
     * @param string $groupId
     * @param string $userId
     * @return array
     */
    public function get(string $groupId, string $userId)
    {
        return $this->client->request('GET', 'groups/' . $groupId . '/members/' . $userId);
    }

    /**
     * Removes a member from a group.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/members/delete
     * @param string $groupId
     * @param string $userId
     * @return array
     */
    public function delete(string $groupId, string $userId)
    {
        return $this->client->request('DELETE', 'groups/' . $groupId . '/members/' . $userId);
    }
}
