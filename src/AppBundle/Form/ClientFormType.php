<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;




class ClientFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('raison',TextType::class)
            ->add('email',EmailType::class)
            ->add('adresse')
            ->add('region')
            ->add('ville')
            ->add('pays',CountryType::class)
            ->add('telephone',IntegerType::class,array(
                'required' => false ))
            ->add('mobile',IntegerType::class)
            ->add('fax',IntegerType::class,array(
                'required' => false ))
            ->add('siteweb',UrlType::class,array(
                'required' => false ))
            ->add('capital',IntegerType::class ,array(

                'invalid_message' => 'You entered an invalid value, it should include %num% digits',
                'invalid_message_parameters' => array('%num%' => 7),
            ))
            ->add('matriculefiscale')
            ->add('registre')
            ->add('codedouane',IntegerType::class)
            ->add('tva',ChoiceType::class ,array(
                'choices' =>array(
                    'Oui'=>true,
                    'Non'=>false
                ),

            ))
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
            ->add('contacts', CollectionType::class, [
                'entry_type' => ContactClientFormType::class,
                'allow_add'    => true,
                'allow_delete'    => true,
                'by_reference' => false,
            ])


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
