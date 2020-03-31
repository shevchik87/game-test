<?php

namespace App\Game\ChooseWinner\WinnerStartegy;

use App\Game\ChooseWinner\DetermineWinner;
use App\Weapon\Type\PaperWeapon;
use App\Weapon\WeaponInterface;
use App\Weapon\WeaponManager;

class PaperDetermineWinner implements WinnerStrategyInterface
{
    public function whoWin(WeaponInterface $weapon): int
    {
        if ($weapon instanceof PaperWeapon) {
            return DetermineWinner::DRAW;
        }

        if ($weapon->getName() == WeaponManager::WEAPON_STONE) {
            return DetermineWinner::FIRST_WIN;
        }

        return DetermineWinner::SECOND_WIN;
    }
}
