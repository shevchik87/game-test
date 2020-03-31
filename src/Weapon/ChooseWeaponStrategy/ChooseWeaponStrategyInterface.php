<?php

namespace App\Weapon\ChooseWeaponStrategy;

use App\Weapon\WeaponInterface;

interface ChooseWeaponStrategyInterface
{
    public function getWeapon(): WeaponInterface;
}