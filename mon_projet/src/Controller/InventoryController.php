<?php

/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 13/11/17
 * Time: 14:16
 */

namespace App\Controller;


use App\Entity\Person;
use App\Entity\Material;
use App\Entity\Inventory;
use App\Calculate\Inventory as Calcul;
use App\Form\InventoryType;
use App\Form\MaterialType;
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

class InventoryController extends Controller
{

    /**
     * @Route("/newInv",name="newInv")
     */
    public function newAction(Request $request)
    {

        $inventory = new Inventory();
        $form = $this->createForm(InventoryType::class, $inventory);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $test = new calcul($em);


        if($form->isValid() && $form->isSubmitted())
        {
            $test->setPerson($inventory->getPerson());
            $test->setInventory($inventory);
            if($test->calcul())
            {
                $em->persist($inventory);
                $em->flush();
                $this->addFlash('info','Inventaire bien enregistré');
            }

        }
        return $this->render('Inventory/new.html.twig', array('form' => $form->createView()));


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

    /**
     * @Route("/editInv",name="editInv")
     */
    public function editAction(Request $request)
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
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Inventory::class);
        $material=$repo->find(1);
        $form = $this->createForm(InventoryType::class, $material);
        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted())
        {
            $em->persist($material);
            $em->flush();
            $this->addFlash('info','Inventaire bien modifié');
        }
        return $this->render('Inventory/edit.html.twig', array('form' => $form->createView()));


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

    /**
     * @Route("/indexInv",name="indexInv")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Inventory::class);
        $inventory = $repo->findAll();
        return $this->render('Inventory/index.html.twig',array('Inventory' => $inventory));
    }
}
