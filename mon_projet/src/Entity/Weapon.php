<?php

/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 13/11/17
 * Time: 14:08
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class Weapon
 * @ORM\Table
 * @ORM\Entity
 */
class Weapon
{

    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="name",type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $damage;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $damageDistanceCoef;


    /**
     * @ORM\Column(type="integer")
     */
    protected $fireRate;

    /**
     * Weapon constructor.
     * @param string $name
     * @param $damage
     * @param $damageDistanceCoef
     * @param $fireRate
     */
    public function __construct($name, $damage, $damageDistanceCoef, $fireRate)
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->damageDistanceCoef = $damageDistanceCoef;
        $this->fireRate = $fireRate;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @return mixed
     */
    public function getDamageDistanceCoef()
    {
        return $this->damageDistanceCoef;
    }

    /**
     * @return mixed
     */
    public function getFireRate()
    {
        return $this->fireRate;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }



    function __toString()
    {
        return $this->name;
    }

}