<?php

namespace App\Subscriber;

use App\AppEvent;
use App\Event\PlayerEvent;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Validator\Tests\Fixtures\Entity;
use Symfony\Component\Validator\Constraints\DateTime;


class PlayerSubscriber implements EventSubscriberInterface
{
    protected $em;

    /**
     * PlayerSubscriber constructor.
     * @param $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public static function getSubscribedEvents()
    {
    return array(AppEvent::PLAYER_ADD => 'playerAdd',
        AppEvent::PLAYER_EDIT => 'playerEdit');
    }

    public function playerAdd(PlayerEvent $playerEvent){

    $player = $playerEvent->getPlayer();
    $player->setCreatedAt(new \DateTime());
    $player->setUpdatedAt(new \DateTime());

    $this->em->persist($player);
    $this->em->flush();

    echo 'ok ajout player';
    }

    public function playerEdit(PlayerEvent $playerEvent){

        $player = $playerEvent->getPlayer();
        $player->setUpdatedAt(new \DateTime());

        $this->em->persist($player);
        $this->em->flush();

        echo 'ok edit player';
    }

}