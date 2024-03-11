<?php

namespace Hymns\GoogleAdminConsole\Directory;

use Hymns\GoogleAdminConsole\Directory;

class UserAlias extends Directory
{
    /**
     * Lists all aliases for a user.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/users.aliases/list
     * @param string $userId
     * @return array
     */
    public function list(string $userId)
    {
        return $this->client->request('GET', 'users/' . $userId . '/aliases');
    }

    /**
     * Adds an alias.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/users.aliases/insert
     * @param string $userId
     * @param string $primaryEmail
     * @param string $alias
     * @return array
     */
    public function create(string $userId, string $primaryEmail, string $alias)
    {
        $body = [
            'primaryEmail' => $primaryEmail,
            'alias' => $alias
        ];

        return $this->client->request('POST', 'users/' . $userId . '/aliases', $body);
    }

    /**
     * Removes an alias.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/users.aliases/delete
     * @param string $userId
     * @param string $alias
     * @return array
     */
    public function delete(string $userId, string $alias)
    {
        return $this->client->request('DELETE', 'users/' . $userId. '/aliases/' . $alias);
    }
}
