<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class MenuType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder
            // Max lenght : 200 chars
           ->add('name',TextType::class,array('required' => false))
           //Falcultative
           ->add('description',TextAreaType::class,array('required' => false))

           // Longueur max: 50chars
           ->add('ingredients',TextAreaType::class, array('required' => false))
           // Facultative
           ->add('imageFile', FileType::class,array('required' => false))
           ->add('Enregistrer', SubmitType::class)
       ;

   }
}

 ?>
