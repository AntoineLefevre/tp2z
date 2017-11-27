<?php
/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 27/11/17
 * Time: 14:27
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class Item
 * @ORM\Table
 * @ORM\Entity
 */
class Item
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
     * @var string
     * @ORM\Column(name="type_item",type="string")
     */
    protected $type_item;

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
     * @return string
     */
    public function getTypeItem()
    {
        return $this->type_item;
    }

    /**
     * @param string $type_item
     */
    public function setTypeItem($type_item)
    {
        $this->type_item = $type_item;
    }

    function __toString()
    {
        return $this->name;
    }


}