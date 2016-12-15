<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class UserType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder
            // Max lenght : 200 chars
           ->add('username',TextType::class,array('required' => false))
           //Falcultative
           ->add('password',PasswordType::class,array('required' => false))

           ->add('Connexion', SubmitType::class)
       ;

   }
}

 ?>
