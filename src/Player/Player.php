<?php

namespace App\Player;

use App\Weapon\ChooseWeaponStrategy\ChooseWeaponStrategyInterface;
use App\Weapon\WeaponInterface;

class Player implements PlayerInterface
{
    /**
     * @var ChooseWeaponStrategyInterface
     */
    private $weaponStrategy;

    /**
     * @var string
     */
    private $name;

    /**
     * Player constructor.
     * @param string $playerName
     */
    public function __construct(string $playerName)
    {
        $this->name = $playerName;
    }

    public function setStrategyChooseWeapon(ChooseWeaponStrategyInterface $strategy)
    {
        $this->weaponStrategy = $strategy;
    }

    public function getWeapon(): WeaponInterface
    {
        return $this->weaponStrategy->getWeapon();
    }

    public function getName(): string
    {
        return $this->name;
    }

}
