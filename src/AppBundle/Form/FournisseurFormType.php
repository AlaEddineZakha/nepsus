<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class FournisseurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom',TextType::class)
        ->add('email',EmailType::class)
        ->add('adresse')
        ->add('region')
        ->add('ville')
        ->add('pays',CountryType::class,array(
            'placeholder' => 'Sélectionnez le pays'))
        ->add('codepostal')
        ->add('telephone')
            ->add('tva',ChoiceType::class ,array(
                'choices' =>array(
                    'Oui'=>true,
                    'Non'=>false
                )
            ))
        ->add('fax')
            ->add('codedouane',IntegerType::class)
            ->add('nbemp',IntegerType::class)
        ->add('siteweb' ,UrlType::class)
        ->add('capital',MoneyType::class, array(
            'divisor' => 100,
            'currency'=>'TND'
        ))
        ->add('matriculefiscal')
        ->add('registre')
            ->add('formejuridique',ChoiceType::class,array(

                    'choices'  => array(
                        'Entreprise individuelle' => 'Entreprise individuelle',
                       'Société à responsabilité limitée (SARL)'=>'Société à responsabilité limitée (SARL)',
        'Société unipersonnelle à responsabilité limitée (SUARL)'=>'Société unipersonnelle à responsabilité limitée (SUARL)',
        'Société anonyme (SA)'=>'Société anonyme (SA)',
        'Société en commandite par actions (SCA)'=>'Société en commandite par actions (SCA)'



                    ),
            ))
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
            'data_class' => 'AppBundle\Entity\Fournisseur'
        ]);

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_fournisseur_form_type';
    }
}
