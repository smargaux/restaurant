<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class MenuLikeType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder
            // Max lenght : 200 chars
           ->add('rating',ChoiceType::class,array('required' => true, "label"=>"Note",'expanded'=>true,'choice_label'=>false,'multiple'=>false,'choices' => array(
        '1' => 1,
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,

    ),))

           // Longueur max: 50chars
           ->add('user',TextType::class, array('required' => false, "label"=>"Utilisateur"))
           ->add('Noter', SubmitType::class)
       ;

   }
}

 ?>
