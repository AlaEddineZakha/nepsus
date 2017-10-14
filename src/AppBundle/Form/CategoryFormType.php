<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class)
        ->add('parent', EntityType::class, array(
        'class' => 'AppBundle:Category',
        'query_builder' => function (EntityRepository $er) {
            return $er->createQueryBuilder('u')
                ->orderBy('u.nom', 'ASC');
        },
        'choice_label' => 'nom',
    ))

    ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Category'
        ]);

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_category_form_type';
    }
}
