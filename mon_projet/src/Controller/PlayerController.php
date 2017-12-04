<?php

/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 13/11/17
 * Time: 14:16
 */

namespace App\Controller;

use App\Entity\Person;
use App\Entity\Player;
use App\Form\PersonType;
use App\Form\PlayerType;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Persisters\Entity;
use Symfony\Component\Translation\Tests\StringClass;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @Route(path="/player")
 */
class PlayerController extends Controller
{

    /**
     * @Route("/new",name="new")
     */
    public function newAction(Request $request)
    {
        $player = $this->get(\App\Entity\Player::class);
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
            $this->addFlash('info','user bien enregistré');
        }
        return $this->render('Player/new.html.twig', array('form' => $form->createView()));


    }

    /**
     * @Route("/edit",name="edit")
     */
    public function editAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Player::class);
        $player = $repo->find(1);
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
            $this->addFlash('info','User bien modifié');
        }
        return $this->render('Player/edit.html.twig', array('form' => $form->createView()));



    }

    /**
     * @Route("/index",name="index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Person::class);
        $user = $repo->findAll();
        return $this->render('Person/index.html.twig',array('User' => $user));
    }

    /**
     * @Route("/show/{id}",name="show")
     */
    public function showAction(Person $player)
    {
        return $this->render('Person/show.html.twig',array('Person' => $player));
    }
}
