<?php

/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 13/11/17
 * Time: 14:16
 */

namespace App\Controller;

use App\Entity\Person;
use App\Entity\PlayerItem;
use App\Form\PersonType;
use App\Form\PlayerItemType;
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

class PlayeritemController extends Controller
{

    /**
     * @Route("/newPlayerItem",name="newPlayerItem")
     */
    public function newAction(Request $request)
    {
        /*
        $person = new person;
        $form = $this->createFormBuilder($person)
            ->add('name', TextType::class)
            ->add('color', TextType::class)
            ->add('age', NumberType::class)
            ->add('createdAt', DateType::class)
            ->add('visible', CheckboxType::class)
            ->add('save', SubmitType::class, array('label' => "créer"))
            ->getForm();
        */
        $playerItem = $this->get(\App\Entity\PlayerItem::class);
        $form = $this->createForm(PlayerItemType::class, $playerItem);
        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($playerItem);
            $em->flush();
            $this->addFlash('info','user bien enregistré');
        }
        return $this->render('PlayerItem/new.html.twig', array('form' => $form->createView()));


        /*
        $em = $this->getDoctrine()->getManager();
        $person = new Person();
        $person->setName('Antoine');
        $person->setAge(10);
        $person->setVisible(true);
        $person->setCreatedAt(new \DateTime('now'));
        $person->setColor('green');
        $em->persist($person);
        $em->flush();*/


    }

}
