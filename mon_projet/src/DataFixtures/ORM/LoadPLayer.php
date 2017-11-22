<?php
/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 22/11/17
 * Time: 09:38
 */

namespace App\DataFixtures\ORM;


use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadPLayer extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $players = [
            $faker->name => 'shotgun',
            $faker->name => 'shotgun',
            $faker->name => 'shotgun'
        ];

        foreach($players as $name => $weapon)
        {
            $player = new Player();
            $player->setName($name);
            $player->setCurrentWeapon($this->getReference($weapon));
            $manager->persist($player);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [loadWeapon::class];
    }

    public function orderBy()
    {
        return 2;
    }
}