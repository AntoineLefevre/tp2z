<?php

namespace App\Form;
use App\Entity\Person;
use App\Entity\PlayerItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;


class PlayerItemType extends AbstractType
{
    private $nombreMax;

    public function __construct($nombreMax)
    {
        $this->nombreMax=$nombreMax;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => PlayerItem::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $data=[];
        for($i=0;$i<$this->nombreMax;$i++)
        {
            $data[$i]=$i+1;
        }
        $builder
            ->add('player', null)
            ->add('item', null)
            ->add('position', ChoiceType::class,array('choices' => $data))
            ->add('created_at', DateTimeType::class)
            ->add('save', SubmitType::class, array('label' =>"créer"))
            ->getForm();
    }

}