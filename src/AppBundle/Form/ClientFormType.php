<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class ClientFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class)
            ->add('prenom')
            ->add('ref')
            ->add('email',EmailType::class)
            ->add('adresse')
            ->add('region')
            ->add('ville')
            ->add('pays',CountryType::class,array(
                'placeholder' => 'Sélectionnez le pays'))
            ->add('codepostal')
            ->add('telephone')
            ->add('mobile',IntegerType::class)
            ->add('siteweb')
            ->add('capital')
            ->add('matriculefiscale')
            ->add('registre')
            ->add('created', DateTimeType::class, array(
        'format' => \IntlDateFormatter::SHORT,
        'input' => 'datetime',
        'widget' => 'single_text',
        'data' => new \DateTime("now"))
            )
            ->add('save',SubmitType::class)
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Client'
        ]);

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_client_form_type';
    }
}
