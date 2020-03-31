<?php

namespace Tests\Unit\Game\ChooseWinner\WinnerStartegy;

use App\Game\ChooseWinner\DetermineWinner;
use App\Game\ChooseWinner\WinnerStartegy\ScissorsDetermineWinner;
use App\Weapon\Type\PaperWeapon;
use App\Weapon\Type\ScissorsWeapon;
use App\Weapon\Type\StoneWeapon;
use PHPUnit\Framework\TestCase;

class ScissorsDetermineWinnerTest extends TestCase
{
    public function testWhoWin()
    {
        $determiner = new ScissorsDetermineWinner();

        $this->assertEquals(DetermineWinner::FIRST_WIN, $determiner->whoWin(new PaperWeapon()));
        $this->assertEquals(DetermineWinner::DRAW, $determiner->whoWin(new ScissorsWeapon()));
        $this->assertEquals(DetermineWinner::SECOND_WIN, $determiner->whoWin(new StoneWeapon()));
    }
}
