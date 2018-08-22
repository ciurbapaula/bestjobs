<?php
/**
 * Created by PhpStorm.
 * User: ciurb
 * Date: 09.08.2018
 * Time: 20:09
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginForm extends AbstractType
{ public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('_username')
        ->add('_password', PasswordType::class)
    ;
}

}