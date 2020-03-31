<?php

namespace Tests\Unit\Game;

use App\Game\ChooseWinner\DetermineWinner;
use App\Game\GameManager;
use App\Player\Player;
use App\Weapon\Type\PaperWeapon;
use App\Weapon\Type\StoneWeapon;
use PHPUnit\Framework\TestCase;

class GameManagerTest extends TestCase
{
    public function testDetermine()
    {
        $p1 = $this->getMockBuilder(Player::class)
            ->disableOriginalConstructor()
            ->getMock();
        $p1->method('getWeapon')->willReturn(new PaperWeapon());

        $p2 = $this->getMockBuilder(Player::class)
            ->disableOriginalConstructor()
            ->getMock();
        $p2->method('getWeapon')->willReturn(new StoneWeapon());
        $detectMock = $this->getMockBuilder(DetermineWinner::class)
            ->disableOriginalConstructor()
            ->getMock();
        $detectMock->expects($this->exactly(3))->method('determine')->with(new PaperWeapon(), new StoneWeapon())
            ->willReturnOnConsecutiveCalls(12, 1, 2);

        $manager = new GameManager($detectMock);

        $manager->determineWinner($p1, $p2);
        $manager->determineWinner($p1, $p2);
        $manager->determineWinner($p1, $p2);

        $result  = [1 => 1, 2=>1, 12=>1];

        $this->assertEquals($result, $manager->getResult());
    }
}
