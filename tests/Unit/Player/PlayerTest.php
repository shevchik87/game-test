<?php

namespace Tests\Unit\Player;

use App\Player\Player;
use App\Weapon\ChooseWeaponStrategy\ChooseWeaponStrategyInterface;
use App\Weapon\ChooseWeaponStrategy\OnlyOneWeaponStrategy;
use App\Weapon\Type\PaperWeapon;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testPlayer()
    {
        /** @var ChooseWeaponStrategyInterface|MockObject $strategyMock */
        $strategyMock = $this->getMockBuilder(OnlyOneWeaponStrategy::class)
            ->disableOriginalConstructor()
            ->getMock();

        $strategyMock->expects($this->once())->method('getWeapon')
            ->willReturn(new PaperWeapon());

        $player = new Player('test_name');
        $player->setStrategyChooseWeapon($strategyMock);

        $this->assertEquals('test_name', $player->getName());
        $this->assertTrue($player->getWeapon() instanceof PaperWeapon);
    }
}
