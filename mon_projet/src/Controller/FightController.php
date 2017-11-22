<?php

/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 13/11/17
 * Time: 14:16
 */

namespace App\Controller;

use App\Fight\FightHandler;
use App\Fight\DamageCalculator;
use App\Form\FightType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FightController extends Controller
{
    /**
     * @Route(path="/fight", name="fight")
     */
    public function indexAction(Request $request, EntityManager $manager, FightHandler $fightHandler)
    {
        $form = $this->createForm(FightType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $fightHandler->handle($form->getData());
            $manager->flush();

            return $this->redirectToRoute('player_list');


        }


        return $this->render('Fight/index.html.twig', ['form' => $form->createView()]);
    }
}
