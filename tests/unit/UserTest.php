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
 * Class UserTest
 */
class UserTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private const TOKEN = 'EAAjCvpU8GqQBAKLUsonZA1U4gQZAZALNUDuPslbIqS9UXBV2h9cwKjs6lpc6YRZAHYB3rAZB6mpMT32RQA4gvo0TUKULUI17yeHd6eGObeQGbgiTHPdU3GxxZAjLMvwp0JBUFUZBOu5SUiiCOTLpANB2ZBvBB08q2MDl7BE2PrDlKgZDZD';

    /**
     * @var User
     */
    private $user;
    
    protected function _before()
    {
        $connection = new Connection(ConnectionTest::APP_ID, ConnectionTest::APP_SECRET);
        $this->user = new User($connection, self::TOKEN);
    }

    // tests
    public function testCreation()
    {
        $this->assertInstanceOf(User::class, $this->user);
    }

    public function testGetPage()
    {
        $page = $this->user->getPage('devsvetruzi');
        $this->assertInstanceOf(Page::class, $page);
    }
}