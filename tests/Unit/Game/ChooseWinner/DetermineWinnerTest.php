<?php

namespace Tests\Unit\Game\ChooseWinner;

use App\Game\ChooseWinner\DetermineWinner;
use App\Game\ChooseWinner\WinnerStartegy\BuilderDetermineStrategy;
use App\Game\ChooseWinner\WinnerStartegy\PaperDetermineWinner;
use App\Weapon\Type\PaperWeapon;
use App\Weapon\Type\ScissorsWeapon;
use App\Weapon\Type\StoneWeapon;
use App\Weapon\WeaponManager;
use PHPUnit\Framework\TestCase;

class DetermineWinnerTest extends TestCase
{
    public function testDetermine()
    {
        $builderMock = $this->getMockBuilder(BuilderDetermineStrategy::class)
            ->disableOriginalConstructor()
            ->getMock();

        $builderMock->expects($this->exactly(3))->method('getStrategy')
            ->with(WeaponManager::WEAPON_PAPER)
            ->willReturn(
                new PaperDetermineWinner(),
            );

        $determine = new DetermineWinner($builderMock);

        $weaponPaper = new PaperWeapon();
        $weaponStone = new StoneWeapon();
        $weaponScissors = new ScissorsWeapon();

        $this->assertEquals(DetermineWinner::DRAW, $determine->determine($weaponPaper, $weaponPaper));
        $this->assertEquals(DetermineWinner::FIRST_WIN, $determine->determine($weaponPaper, $weaponStone));
        $this->assertEquals(DetermineWinner::SECOND_WIN, $determine->determine($weaponPaper, $weaponScissors));
    }
}
