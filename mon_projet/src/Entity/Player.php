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
 * Class Person
 * @ORM\Table
 * @ORM\Entity
 */
class Player
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
    protected $healthPoint=100;

    /**
     * @return mixed
     */
    public function getHealthPoint()
    {
        return $this->healthPoint;
    }

    /**
     * @param mixed $healthPoint
     */
    public function setHealthPoint($healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Weapon")
     */
    protected $currentWeapon;
    /**
     * Person constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getCurrentWeapon()
    {
        return $this->currentWeapon;
    }

    /**
     * @param mixed $currentWeapon
     */
    public function setCurrentWeapon($currentWeapon)
    {
        $this->currentWeapon = $currentWeapon;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    function __toString()
    {
        return $this->name;
    }

}