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
use Facebook\Facebook;
use Facebook\FacebookResponse;

/**
 * Class Connection
 * @package Majksa\Messenger
 */
class Connection
{
    /**
     * @var Facebook
     */
    public $facebook;

    public const GRAPH_VERSION = 'v2.10';
    public const ME = 'me';

    /**
     * Application constructor.
     * @param string $id
     * @param string $secret
     * @throws FacebookSDKException
     */
    public function __construct(string $id, string $secret)
    {
        $this->facebook = new Facebook([
            'app_id' => $id,
            'app_secret' => $secret,
            'default_graph_version' => self::GRAPH_VERSION
        ]);
    }

    /**
     * @param array $fields
     * @param string $token
     * @return FacebookResponse
     * @throws FacebookSDKException
     */
    public function execute(string $id, string $token, array $fields = []): FacebookResponse
    {
        $endpoint = self::generateEndpoint($id, $fields);
        return $this->facebook->get($endpoint, $token);
    }

    // TODO: generating endpoint from array that is indexed and associative
    /**
     * @param string $id
     * @param array $fields
     * @return string
     */
    static function generateEndpoint(string $id, array $fields): string
    {
        $endpoint = '/'.$id.(empty($fields)?'':'?fields=');
        $json = json_encode($fields, JSON_THROW_ON_ERROR, 512);
        $trimmed = substr($json, 1, -1);
        $fieldsStr = str_replace(array('[', ']', ':', '"'), array('{', '}', '', ''), $trimmed);
        return $endpoint . $fieldsStr;
    }
}