<?php

namespace App\Form;
use App\Entity\Inventory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class InventoryType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => Inventory::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('person')
            ->add('material')
            ->add('numberOfItem', NumberType::class)
            ->add('save', SubmitType::class, array('label' =>"créer"))
            ->getForm();
    }

}