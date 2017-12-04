<?php

namespace App\Form;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PlayerType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => Player::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('age', IntegerType::class)
            ->add('country', TextType::class)
            ->addEventListener( FormEvents::PRE_SET_DATA,
            array($this, 'onPreSetData') );
    }

    public function onPreSetData(FormEvent $event)
    {
        $player = $event->getData();
        $form = $event->getForm();

        if ($player->getId() !== null){
            $form->remove('name');

        }

        $form->add('save', SubmitType::class, array('label' =>"créer"));

    }

}