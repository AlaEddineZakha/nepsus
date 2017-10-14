<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModuleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('active', ChoiceType::class, array(
            'expanded' => true,
            'multiple' => false,
            'choices' => array(
                'On'=>true,
                'Off'=>false
            )));

    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Modules'
        ]);

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_module_form_type';
    }
}
