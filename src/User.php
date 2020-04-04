<?php
/**
 * Copyright (C) 2020  Majksa
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace Majksa\Messenger;


use Facebook\Exceptions\FacebookSDKException;

/**
 * Class User
 * @package Majksa\Messenger
 */
class User extends Node
{
    /**
     * @param string $id
     * @return Page
     * @throws FacebookSDKException
     */
    public function getPage(string $id): Page
    {
        $response = $this->connection->execute($id, $this->token, ['access_token']);
        return new Page($this->connection, $response->getAccessToken());
    }
}