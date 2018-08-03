<?php
/**
 * Created by PhpStorm.
 * User: ciurb
 * Date: 02.08.2018
 * Time: 14:35
 */

namespace App\Form;
use App\Entity\Job;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use  Symfony\Component\OptionsResolver\OptionsResolver;


class JobForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  // creates a task and gives it some dummy data for this example

        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
//            ->add('SalariuMin', TextType::class, array(
//                'required' => false,
//                'label' => 'Salariu in in Euro'
//            ))
//            ->add('SalariuMax', TextType::class)
            ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data class'=>Job::class,));
        dump($resolver);
    }



}