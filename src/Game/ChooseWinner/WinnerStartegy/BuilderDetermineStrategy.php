<?php

namespace App\Game\ChooseWinner\WinnerStartegy;

use App\Weapon\WeaponManager;

class BuilderDetermineStrategy
{
    public function getStrategy(string $context)
    {
        switch ($context) {
            case WeaponManager::WEAPON_PAPER:
                return new PaperDetermineWinner();
            case WeaponManager::WEAPON_SCISSORS:
                return new ScissorsDetermineWinner();
            case WeaponManager::WEAPON_STONE:
                return new StoneDetermineWinner();
            default:
                throw new \InvalidArgumentException("No found determine winner strategy");
        }
    }
}
