<?php
/**
 * Created by PhpStorm.
 * User: ciurb
 * Date: 08.08.2018
 * Time: 18:38
 */

namespace App\Form;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;



class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,
            ['label' => false,
                'attr' => [
                    'id' => 'key',
                    'placeholder' => '  E-mail'
                ],
                ])
            ->add('username', TextType::class,
                ['label' => false,
                    'attr' => [
                        'id' => 'key',
                        'placeholder' => '  Username'
                    ],
                ])
            ->add('plainPassword', RepeatedType::class
                ,array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => false,'attr' => [

                    'placeholder' => '  Parola'
                ],),

                'second_options' => array('label' =>  false,'attr' => [

                    'placeholder' => ' Repetați parola  '
                ],),

            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }

}