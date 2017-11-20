<?php
/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 20/11/17
 * Time: 13:20
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class Person
 * @ORM\Table
 * @ORM\Entity
 */
class Material
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
     * @var float
     *
     * @ORM\Column(name="weight",type="float")
     */
    protected $weight;

    /**
     * Material constructor.
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

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    function __toString()
    {
        return $this->name;
    }


}