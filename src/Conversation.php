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


class Conversation
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var array
     */
    private $messages = [];

    /**
     * Conversation constructor.
     * @param string $id
     * @param array $messages
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->messages = $this->parseMessages($data['messages']);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    private function parseMessages(array $data)
    {
        $messages = [];
        foreach ($data as $message) {
            $messages[] = new Message($message);
        }
        return $messages;
    }
}