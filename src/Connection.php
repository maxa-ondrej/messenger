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

    /**
     * Application constructor.
     * @param string $id
     * @param string $secret
     */
    public function __construct(string $id, string$secret)
    {
        $this->facebook = new Facebook([
            'app_id' => $id,
            'app_secret' => $secret,
            'default_graph_version' => self::GRAPH_VERSION
        ]);
    }

    /**
     * @param string $endpoint
     * @param string $token
     * @return FacebookResponse
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function execute(string $endpoint, string $token): FacebookResponse
    {
        return $this->facebook->get($endpoint, $token);
    }
}