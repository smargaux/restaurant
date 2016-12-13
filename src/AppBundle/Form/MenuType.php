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
           ->add('name',TextType::class,array('required' => true))
           ->add('description',TextAreaType::class,array('required' => true))
           ->add('ingredients',TextAreaType::class, array('required' => true))
           ->add('imageFile', FileType::class)           
           ->add('Enregistrer', SubmitType::class)
       ;

   }
}

 ?>
