<?php


namespace Majksa\Messenger;


use Facebook\Exceptions\FacebookSDKException;

class Page extends Node
{
    /**
     * @throws FacebookSDKException
     */
    public function getConversations(): array
    {
        $conversationsRaw = $this->downloadConversations();
        $conversations = $this->parseConversations($conversationsRaw);
        return $conversations;
    }

    /**
     * @throws FacebookSDKException
     */
    private function downloadConversations()
    {
        $response = $this->connection->execute(Connection::ME, ['conversations'=>['messages'=>['message']]], $this->token);
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