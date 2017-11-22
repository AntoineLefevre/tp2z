<?php
/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 22/11/17
 * Time: 10:52
 */

namespace App\Fight;

use App\Entity\Weapon;

class DamageCalculator
{
    public function calculate(Weapon $weapon,$range)
    {
        $damage = $weapon->getDamage() - ($weapon->getDamageDistanceCoef()*$range);

        if($damage < 0)
        {
            return 0;
        }

        return round($damage);
    }
}