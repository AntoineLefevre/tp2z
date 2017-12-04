<?php

/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 13/11/17
 * Time: 14:16
 */

namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonType;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\EventDispatcher\EventDispatcher;
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
use App\AppEvent;

/**
 * @Route(path="/person")
 */
class PersonController extends Controller
{

    /**
     * @Route("/new",name="new")
     */
    public function newAction(Request $request)
    {
        $player = $this->get(\App\Entity\Person::class);
        $form=$this->createForm(PersonType::class, $player);
        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted()) {
            $playerEvent = $this->get(\App\Event\PlayerEvent::class);
            $playerEvent->setPlayer($player);
            $dispatcher = $this->get('event_dispatcher');

            $dispatcher->dispatch(AppEvent::PLAYER_ADD, $playerEvent);

        }

        return $this->render('Person/new.html.twig', array('form' => $form->createView()));

    }

    /**
     * @Route("/edit",name="edit")
     */
    public function editAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Person::class);
        $player = $repo->find(1);
        $form=$this->createForm(PersonType::class, $player);
        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted()) {
            $playerEvent = $this->get(\App\Event\PlayerEvent::class);

            $dispatcher = $this->get('event_dispatcher');

            $dispatcher->dispatch(AppEvent::PLAYER_EDIT, $playerEvent);

        }

        return $this->render('Person/edit.html.twig', array('form' => $form->createView()));


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
}
