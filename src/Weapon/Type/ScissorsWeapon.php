<?php

namespace App\Weapon\Type;

use App\Weapon\WeaponInterface;
use App\Weapon\WeaponManager;

class ScissorsWeapon implements WeaponInterface
{
    public function getName(): string
    {
        return WeaponManager::WEAPON_SCISSORS;
    }

}
