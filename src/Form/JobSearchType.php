<?php
/**
 * Created by PhpStorm.
 * User: ciurb
 * Date: 07.08.2018
 * Time: 11:31
 */

namespace App\Form;


use App\Model\JobSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobSearchType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('keyword', TextType::class,
            [
                'attr' => [
                    'id' => 'key',
                    'placeholder' => 'Cuvant cheie'
                ],
                'label' => false,

            ])
        ->add('cauta', SubmitType::class,
            [
                'attr' => [
                    'id' => 'cauta',
                    'icon' => 'fa fa-search',
                ],

            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data class'=>JobSearch::class));
    }
}