<?php

use Codeception\Test\Unit;
use Majksa\Messenger\Connection;

class ConnectionTest extends Unit
{
    public const APP_ID = '2465923617004196';
    public const APP_SECRET = 'a863400c265d24b719566370e422dde6';
    private const TOKEN = 'EAAjCvpU8GqQBAKLUsonZA1U4gQZAZALNUDuPslbIqS9UXBV2h9cwKjs6lpc6YRZAHYB3rAZB6mpMT32RQA4gvo0TUKULUI17yeHd6eGObeQGbgiTHPdU3GxxZAjLMvwp0JBUFUZBOu5SUiiCOTLpANB2ZBvBB08q2MDl7BE2PrDlKgZDZD';
    private const USER_ID = '1356907267838177';

    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var Connection
     */
    private $connection;

    protected function _before()
    {
        $this->connection = new Connection(self::APP_ID, self::APP_SECRET);
    }

    protected function _after()
    {

    }

    public function testExecution()
    {
        $response = $this->connection->execute('/me', self::TOKEN);
        $this->assertEquals(self::USER_ID, $response->getGraphUser()->getId());
    }
}