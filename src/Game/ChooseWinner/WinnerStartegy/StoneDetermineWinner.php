<?php

namespace App\Game\ChooseWinner\WinnerStartegy;

use App\Game\ChooseWinner\DetermineWinner;
use App\Weapon\Type\StoneWeapon;
use App\Weapon\WeaponInterface;
use App\Weapon\WeaponManager;

class StoneDetermineWinner implements WinnerStrategyInterface
{
    public function whoWin(WeaponInterface $weapon): int
    {
        if ($weapon instanceof StoneWeapon) {
            return DetermineWinner::DRAW;
        }

        if ($weapon->getName() == WeaponManager::WEAPON_SCISSORS) {
            return DetermineWinner::FIRST_WIN;
        }

        return DetermineWinner::SECOND_WIN;
    }
}
