<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
            ->add('email',EmailType::class)
            ->add('adresse')
            ->add('region')
            ->add('ville')
            ->add('pays',CountryType::class)
            ->add('codepostal')
            ->add('telephone')
            ->add('mobile')
            ->add('siteweb')
            ->add('created', DateTimeType::class, array(
        'format' => \IntlDateFormatter::SHORT,
        'input' => 'datetime',
        'widget' => 'single_text',
        'data' => new \DateTime("now"))
            )

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
