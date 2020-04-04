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

namespace Majksa\Messenger\Tests\Unit;

use Majksa\Messenger\Connection;
use Majksa\Messenger\Page;

class PageTest extends \Codeception\Test\Unit
{
    /**
     * @var Page
     */
    protected $page;

    private const TOKEN = 'EAAjCvpU8GqQBAAZA6hxmGsXhKGzuc5tZBTKFmoZAGTAaDm4savTjKZBUDDWMbxLhEdMZA8yKgmA6qfDEZBXkhgZBLbO8xqAxTWQeDpxwG1ERAhBXs6ngbdvtZA4nP9wmb8IlZAffxXzc6uht1u1usaabtqVmccwCcct2h9XZAZAsp1EObJgTGw0xRZCE';
    private const MESSAGE_TEXT = 'Ahoj';

    protected function _before()
    {
        $connection = new Connection(ConnectionTest::APP_ID, ConnectionTest::APP_SECRET);
        $this->page = new Page($connection, self::TOKEN);
    }

    public function testGetConversations()
    {
        $conversations = $this->page->getConversations();
        $messages = $conversations[0]->getMessages();
        $message = end($messages);
        $this->assertEquals(self::MESSAGE_TEXT, $message->getText());
    }
}
