<?php

namespace App\Weapon\ChooseWeaponStrategy;

use App\Weapon\Type\PaperWeapon;
use App\Weapon\WeaponInterface;

class OnlyOneWeaponStrategy implements ChooseWeaponStrategyInterface
{
    public function getWeapon(): WeaponInterface
    {
        return new PaperWeapon();
    }

}
