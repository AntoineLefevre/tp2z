<?php

/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 04/12/17
 * Time: 15:41
 */

namespace App\Event;

use Symfony\Component\EventDispatcher\Event;

class PlayerEvent extends Event
{
    private $player;

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param mixed $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }


}