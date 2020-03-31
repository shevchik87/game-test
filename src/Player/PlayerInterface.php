<?php

namespace App\Player;

use App\Weapon\ChooseWeaponStrategy\ChooseWeaponStrategyInterface;
use App\Weapon\WeaponInterface;

interface PlayerInterface
{
    public function setStrategyChooseWeapon(ChooseWeaponStrategyInterface $strategy);

    public function getWeapon(): WeaponInterface;

    public function getName(): string;

}
