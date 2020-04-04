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


use Codeception\Test\Unit;

class MessageTest extends Unit
{
    /**
     * @param $data
     * @throws \Exception
     * @dataProvider messageProvider
     */
    public function test__construct($data)
    {
        $message = $this->construct(Message::class, [$data]);
        $this->assertEquals($data['id'], $message->getId());
        $this->assertEquals($data['message'], $message->getText());
    }


    public function messageProvider()
    {
        return [
            [['message' => 'Ahoj', 'id' => 'm_1']],
            [['message' => 'Jak se máš?', 'id' => 'm_2']],
            [['message' => 'Hi', 'id' => 'm_3']],
            [['message' => 'How r u?', 'id' => 'm_4']]
        ];
    }
}
