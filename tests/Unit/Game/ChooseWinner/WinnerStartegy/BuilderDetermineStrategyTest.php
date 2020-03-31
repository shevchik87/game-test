<?php

namespace Tests\Unit\Game\ChooseWinner\WinnerStartegy;

use App\Game\ChooseWinner\WinnerStartegy\BuilderDetermineStrategy;
use App\Game\ChooseWinner\WinnerStartegy\PaperDetermineWinner;
use App\Game\ChooseWinner\WinnerStartegy\ScissorsDetermineWinner;
use App\Game\ChooseWinner\WinnerStartegy\StoneDetermineWinner;
use App\Weapon\WeaponManager;
use PHPUnit\Framework\TestCase;

class BuilderDetermineStrategyTest extends TestCase
{
    public function testGetStrategy()
    {
        $builder = new BuilderDetermineStrategy();

        $this->assertTrue($builder->getStrategy(WeaponManager::WEAPON_PAPER) instanceof PaperDetermineWinner);
        $this->assertTrue($builder->getStrategy(WeaponManager::WEAPON_STONE) instanceof StoneDetermineWinner);
        $this->assertTrue($builder->getStrategy(WeaponManager::WEAPON_SCISSORS) instanceof ScissorsDetermineWinner);
    }
}
