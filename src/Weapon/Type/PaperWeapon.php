<?php

namespace App\Weapon\Type;

use App\Weapon\WeaponInterface;
use App\Weapon\WeaponManager;

class PaperWeapon implements WeaponInterface
{
    public function getName(): string
    {
        return WeaponManager::WEAPON_PAPER;
    }

}
