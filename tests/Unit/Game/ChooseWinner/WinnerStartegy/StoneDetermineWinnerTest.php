<?php

namespace Tests\Unit\Game\ChooseWinner\WinnerStartegy;

use App\Game\ChooseWinner\DetermineWinner;
use App\Game\ChooseWinner\WinnerStartegy\StoneDetermineWinner;
use App\Weapon\Type\PaperWeapon;
use App\Weapon\Type\ScissorsWeapon;
use App\Weapon\Type\StoneWeapon;
use PHPUnit\Framework\TestCase;

class StoneDetermineWinnerTest extends TestCase
{
    public function testWhoWin()
    {
        $determiner = new StoneDetermineWinner();

        $this->assertEquals(DetermineWinner::DRAW, $determiner->whoWin(new StoneWeapon()));
        $this->assertEquals(DetermineWinner::FIRST_WIN, $determiner->whoWin(new ScissorsWeapon()));
        $this->assertEquals(DetermineWinner::SECOND_WIN, $determiner->whoWin(new PaperWeapon()));
    }
}
