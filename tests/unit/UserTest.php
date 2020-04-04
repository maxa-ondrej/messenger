<?php

require 'ConnectionTest.php';

use Codeception\Test\Unit;
use Majksa\Messenger\Connection;
use Majksa\Messenger\User;

class UserTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private const TOKEN = 'EAAjCvpU8GqQBAKLUsonZA1U4gQZAZALNUDuPslbIqS9UXBV2h9cwKjs6lpc6YRZAHYB3rAZB6mpMT32RQA4gvo0TUKULUI17yeHd6eGObeQGbgiTHPdU3GxxZAjLMvwp0JBUFUZBOu5SUiiCOTLpANB2ZBvBB08q2MDl7BE2PrDlKgZDZD';

    private $user;
    
    protected function _before()
    {
        $connection = new Connection(ConnectionTest::APP_ID, ConnectionTest::APP_SECRET);
        $this->user = new User($connection, self::TOKEN);
    }

    protected function _after()
    {
    }

    // tests
    public function testCreation()
    {
        $this->assertInstanceOf(User::class, $this->user);
    }
}