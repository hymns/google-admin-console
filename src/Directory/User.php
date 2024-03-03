<?php

namespace Hymns\GoogleAdminConsole\Directory;

use Hymns\GoogleAdminConsole\Directory;

class User extends Directory
{
    /**
     * Retrieves a paginated list of either deleted users or all users in a domain.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/users/list
     * @param string $domainName
     * @return array
     */
    public function list(string $domainName)
    {
        $params = [
            'domain'  => $domainName
        ];

        return $this->client->request('GET', 'users', [], $params);
    }

    /**
     * Creates a user.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/users/insert
     * @param string $domainName
     * @param array $userInfo
     * @return array
     */
    public function create(string $domainName, string $userInfo)
    {
        $params = [
            'domain'  => $domainName
        ];

        $body = $userInfo;

        return $this->client->request('POST', 'users', $body, $params);
    }

    /**
     * Retrieves a user.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/users/get
     * @param string $email
     * @return array
     */
    public function get(string $email)
    {
        return $this->client->request('GET', 'users/' . $email);
    }

    /**
     * Updates a user using patch semantics. The update method should be used instead, 
     * because it also supports patch semantics and has better performance. If you're 
     * mapping an external identity to a Google identity, use the update method instead 
     * of the patch method.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/users/patch
     * @param string $email
     * @param array $userInfo
     * @return array
     */
    public function update(string $email, array $userInfo)
    {
        return $this->client->request('PATCH', 'users/' . $email, $userInfo);
    }

    /**
     * Deletes a user.
     *
     * @link https://developers.google.com/admin-sdk/directory/reference/rest/v1/users/delete
     * @param string $email
     * @return array
     */
    public function delete(string $email)
    {
        return $this->client->request('DELETE', 'users/' . $email);
    }
}
