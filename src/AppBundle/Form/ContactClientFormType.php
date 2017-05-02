<?php

namespace AppBundle\Form;
use AppBundle\Entity\ContactClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactClientFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nom')
            ->add('prenom')
            ->add('mobile')
            ->add('telephone')
            ->add('email')

        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ContactClient'
        ));

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_contact_client_form_type';
    }
}
