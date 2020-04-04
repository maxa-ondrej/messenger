<?php

namespace Majksa\Messenger\Tests\Unit;

use Codeception\Test\Unit;
use Majksa\Messenger\Connection;

class ConnectionTest extends Unit
{
    public const APP_ID = '2465923617004196';
    public const APP_SECRET = 'a863400c265d24b719566370e422dde6';

    /**
     * @var \UnitTester
     */
    protected $tester;

    private $connection;

    protected function _before()
    {
        $this->connection = new Connection(self::APP_ID, self::APP_SECRET);
    }

    protected function _after()
    {

    }
}