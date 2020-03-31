<?php

namespace App\Weapon\ChooseWeaponStrategy;

use App\Weapon\WeaponBuilder;
use App\Weapon\WeaponInterface;
use App\Weapon\WeaponManager;

class RandomWeaponStrategy implements ChooseWeaponStrategyInterface
{
    /**
     * @var WeaponBuilder
     */
    private $builderWeapon;

    /**
     * RandomWeaponStrategy constructor.
     * @param WeaponBuilder $builder
     */
    public function __construct(WeaponBuilder $builder)
    {
        $this->builderWeapon = $builder;
    }

    /**
     * @return WeaponInterface
     */
    public function getWeapon(): WeaponInterface
    {
       $index = rand(0, count(WeaponManager::WEAPONS) - 1);

       $context = WeaponManager::WEAPONS[$index];

       return $this->builderWeapon->getWeapon($context);
    }
}
