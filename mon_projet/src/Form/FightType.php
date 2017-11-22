<?php
/**
 * Created by PhpStorm.
 * User: antoine.lefevre
 * Date: 22/11/17
 * Time: 10:12
 */

namespace App\Form;


use App\Entity\Player;
use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Tests\Fixtures\Entity;

class FightType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => EntityType::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('player', EntityType::class,
                ['class' => Player::class,
                 'choice_label' => 'name',
                 'multiple' => false,
                 'expanded' => false,])
            ->add('distance', IntegerType::class)
            ->add('target', EntityType::class,
                ['class' => Player::class,
                    'choice_label' => 'name',
                    'multiple' => false,
                    'expanded' => false,])
            ->add('save', SubmitType::class, array('label' =>"Fight"))
            ->getForm();


    }
}