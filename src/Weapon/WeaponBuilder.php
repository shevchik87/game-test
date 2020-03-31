<?php

namespace App\Weapon;

use App\Weapon\Type\PaperWeapon;
use App\Weapon\Type\ScissorsWeapon;
use App\Weapon\Type\StoneWeapon;

class WeaponBuilder
{
    public function getWeapon(string $context)
    {
        switch ($context) {
            case WeaponManager::WEAPON_PAPER:
                return new PaperWeapon();
            case WeaponManager::WEAPON_STONE:
                return new StoneWeapon();
            case WeaponManager::WEAPON_SCISSORS:
                return new ScissorsWeapon();
            default:
                throw new \InvalidArgumentException('No found type of weapon');
        }
    }
}
