<?php

namespace App\Game\ChooseWinner\WinnerStartegy;

use App\Weapon\WeaponInterface;

interface WinnerStrategyInterface
{
    public function whoWin(WeaponInterface $weapon): int;
}