<?php
/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 04/12/17
 * Time: 13:20
 */


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Class Player
 * @ORM\Table
 * @ORM\Entity
 * @UniqueEntity(fields="name", message="Doit être unique")
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
     *
     * @ORM\Column(name="name",type="string")
     * @Assert\NotBlank()
     * @Assert\Length(
     * min = 4,
     * max = 20,
     * minMessage="Votre nom doit comporter au minimum {{ limit }} caractères",
     * maxMessage="Votre nom doit comporter au maximim {{ limit }} caractères")
     * @Assert\Regex(pattern="/\d/",match=false, message="Uniquement min/maj")
     *
     */
    protected $name;

    /**
     *
     * @ORM\Column(name="age", type="integer")
     * @Assert\NotBlank()
     * @Assert\Range(min=18,max=99)
     *
     */
    protected $age;

    /**
     * @ORM\Column(name="country", type="string")
     * @Assert\Choice({"France", "Belgique"}, message="Pays inexistant")
     *
     */
    protected $country;

    /**
     * Player constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    function __toString()
    {
        return $this->name;
    }


}