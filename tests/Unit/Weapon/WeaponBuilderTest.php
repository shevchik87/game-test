<?php

namespace Tests\Unit\Weapon;

use App\Weapon\Type\PaperWeapon;
use App\Weapon\Type\ScissorsWeapon;
use App\Weapon\Type\StoneWeapon;
use App\Weapon\WeaponBuilder;
use App\Weapon\WeaponManager;
use PHPUnit\Framework\TestCase;

class WeaponBuilderTest extends TestCase
{
    public function testGetWeapon()
    {
        $builder = new WeaponBuilder();

        $this->assertTrue($builder->getWeapon(WeaponManager::WEAPON_STONE) instanceof StoneWeapon);
        $this->assertTrue($builder->getWeapon(WeaponManager::WEAPON_PAPER) instanceof PaperWeapon);
        $this->assertTrue($builder->getWeapon(WeaponManager::WEAPON_SCISSORS) instanceof ScissorsWeapon);
    }


    public function testGetWeaponFail()
    {
        $this->expectException(\InvalidArgumentException::class);

        $builder = new WeaponBuilder();
        $builder->getWeapon('wrong');
    }
}
