<?php

/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 13/11/17
 * Time: 14:16
 */
namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlayerController extends Controller
{
    /**
     * @Route(path="/", name="player_list")
     */
    public function indexAction()
    {
        $players = $this->getDoctrine()->getRepository(Player::class)->findAll();

        return $this->render('Player/index.html.twig', ['players' => $players]);
    }
}


