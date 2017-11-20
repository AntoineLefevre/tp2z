<?php

/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 20/11/17
 * Time: 15:54
 */
namespace App\Calculate;

use Doctrine\ORM\EntityManager;
use App\Entity\Person;

class Inventory
{
    private $entityManager;

    private $person;

    private $inventory;
    /**
     * Inventory constructor.
     * @param $entityManager
     */
    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function calcul()
    {
        $weightMax = $this->getPerson()->getMaxWeight();
        $totalWeight=0;
        foreach($this->getPerson()->getInventories() as $item)
        {
            $totalWeight+=$item->getMaterial()->getWeight()* $item->getNumberOfItem();
        }
        $totalWeight+=$this->inventory->getMaterial()->getWeight() * $this->inventory->getNumberOfItem();

        if($totalWeight > $weightMax)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
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
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * @param mixed $inventory
     */
    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
    }





}
