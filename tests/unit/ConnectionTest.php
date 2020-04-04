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

use Codeception\Test\Unit;

/**
 * Class ConnectionTest
 */
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

    public function testExecution()
    {
        $response = $this->connection->execute(Connection::ME, self::TOKEN);
        $this->assertEquals(self::USER_ID, $response->getGraphUser()->getId());
    }

    /**
     * @dataProvider endpointProvider
     * @param $id
     * @param $fields
     * @param $expected
     */
    public function testGenerateEndpoint($id, $fields, $expected)
    {
        $endpoint = Connection::generateEndpoint($id, $fields);
        $this->assertEquals($expected, $endpoint);
    }

    /**
     * @return array
     */
    public function endpointProvider(): array
    {
        return [
            ['id' => 'me', 'fields' => [], 'expected' => '/me'],
            ['id' => 'devsvetruzi', 'fields' => [], 'expected' => '/devsvetruzi']
        ];
    }
}