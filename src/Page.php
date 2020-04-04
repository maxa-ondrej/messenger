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
        $conversationsArray = $this->downloadConversations();

    }

    /**
     * @throws FacebookSDKException
     */
    private function downloadConversations()
    {
        $response = $this->connection->execute(Connection::ME, ['conversations'=>['messages'=>['message']]], $this->token);
        return $response->getGraphNode()->getField('conversations')->asArray();
    }
}