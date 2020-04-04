<?php
/**
 * Copyright (C) 2020  Ondřej Maxa
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

namespace Maxa\Ondrej\Messenger;


use Facebook\Exceptions\FacebookSDKException;

class Page extends Node
{
    /**
     * @throws FacebookSDKException
     */
    public function getConversations(): array
    {
        $conversationsRaw = $this->downloadConversations();
        return $this->parseConversations($conversationsRaw);
    }

    /**
     * @throws FacebookSDKException
     */
    private function downloadConversations()
    {
        $response = $this->connection->execute(Connection::ME, $this->token, ['conversations'=>['messages'=>['message']]]);
        return $response->getGraphNode()->getField('conversations')->asArray();
    }

    /**
     * @param array $conversationsRaw
     */
    private function parseConversations(array $conversationsRaw): array
    {
        $conversations = [];
        foreach ($conversationsRaw as $conversation) {
            $conversations[] = new Conversation($conversation);
        }
        return $conversations;
    }
}