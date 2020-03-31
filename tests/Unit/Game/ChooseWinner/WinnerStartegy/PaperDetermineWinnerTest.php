<?php

namespace Tests\Unit\Game\ChooseWinner\WinnerStartegy;

use App\Game\ChooseWinner\DetermineWinner;
use App\Game\ChooseWinner\WinnerStartegy\PaperDetermineWinner;
use App\Weapon\Type\PaperWeapon;
use App\Weapon\Type\ScissorsWeapon;
use App\Weapon\Type\StoneWeapon;
use PHPUnit\Framework\TestCase;

class PaperDetermineWinnerTest extends TestCase
{
    public function testWhoWin()
    {
        $determiner = new PaperDetermineWinner();

        $this->assertEquals(DetermineWinner::FIRST_WIN, $determiner->whoWin(new StoneWeapon()));
        $this->assertEquals(DetermineWinner::SECOND_WIN, $determiner->whoWin(new ScissorsWeapon()));
        $this->assertEquals(DetermineWinner::DRAW, $determiner->whoWin(new PaperWeapon()));
    }
}
