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
 * Class Inventory
 * @ORM\Table
 * @ORM\Entity
 */
class Inventory
{

    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="inventories")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    protected $person;


    /**
     * @ORM\ManyToOne(targetEntity="Material")
     * @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     */
    protected $material;

    /**
     * @ORM\Column(name="number_of_item", type="integer")
     */
    protected $numberOfItem;

    public function __contsruct()
    {
        $this->inventories = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param mixed $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return mixed
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @param mixed $material
     */
    public function setMaterial($material)
    {
        $this->material = $material;
    }

    /**
     * @return mixed
     */
    public function getNumberOfItem()
    {
        return $this->numberOfItem;
    }

    /**
     * @param mixed $numberOfItem
     */
    public function setNumberOfItem($numberOfItem)
    {
        $this->numberOfItem = $numberOfItem;
    }



}