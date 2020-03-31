<?php

namespace App\Game\ChooseWinner\WinnerStartegy;

use App\Game\ChooseWinner\DetermineWinner;
use App\Weapon\Type\ScissorsWeapon;
use App\Weapon\WeaponInterface;
use App\Weapon\WeaponManager;

class ScissorsDetermineWinner implements WinnerStrategyInterface
{
    public function whoWin(WeaponInterface $weapon): int
    {
        if ($weapon instanceof ScissorsWeapon) {
            return DetermineWinner::DRAW;
        }

        if ($weapon->getName() == WeaponManager::WEAPON_PAPER) {
            return DetermineWinner::FIRST_WIN;
        }

        return DetermineWinner::SECOND_WIN;
    }
}
