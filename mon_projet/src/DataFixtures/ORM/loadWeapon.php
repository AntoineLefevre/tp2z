<?php

/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 22/11/17
 * Time: 09:18
 */

namespace App\DataFixtures\ORM;

use App\Entity\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class loadWeapon extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $weapon = new Weapon('shotgun', 100, 5,3);
        $this->addReference($weapon->getName(),$weapon);
        $manager->persist($weapon);
        $manager->flush();

    }

    public function orderBy()
    {
        return 1;
    }
}