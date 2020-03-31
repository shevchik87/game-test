<?php

namespace App\Game\ChooseWinner;

use App\Game\ChooseWinner\WinnerStartegy\BuilderDetermineStrategy;
use App\Weapon\WeaponInterface;

class DetermineWinner
{
    const DRAW = 12;
    const FIRST_WIN = 1;
    const SECOND_WIN = 2;

    /**
     * @var BuilderDetermineStrategy
     */
    private $builder;

    /**
     * DetermineWinner constructor.
     * @param BuilderDetermineStrategy $builderDetermineStrategy
     */
    public function __construct(BuilderDetermineStrategy $builderDetermineStrategy)
    {
        $this->builder = $builderDetermineStrategy;
    }

    /**
     * @param WeaponInterface $weaponA
     * @param WeaponInterface $weaponB
     * @return integer
     */
    public function determine(WeaponInterface $weaponA, WeaponInterface $weaponB): int
    {
        $strategy = $this->builder->getStrategy($weaponA->getName());

        return $strategy->whoWin($weaponB);
    }
}
