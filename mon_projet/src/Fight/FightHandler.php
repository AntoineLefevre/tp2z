<?php
/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 22/11/17
 * Time: 10:59
 */

namespace App\Fight;

use App\Entity\Player;
use App\Entity\Weapon;

class FightHandler
{
    private $damageCalculator;
    public function __construct(DamageCalculator $damageCalculator)
    {
        $this->damageCalculator = $damageCalculator;
    }

    public function handle(Fight $fight)
    {
        $weapon = $fight->player->getCurrentWeapon();

        $damage = $this->damageCalculator->calculate($weapon, $fight->distance);

        $fight->target->setHealthPoint($fight->target->getHealthPoint() - $damage);
    }

}