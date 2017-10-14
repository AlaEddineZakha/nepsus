<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class BCitemsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('produit', EntityType::class, array(
                'class' => 'AppBundle:Produit',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.libele', 'ASC');
                },
                'choice_label' => 'libele',


            ))

            ->add('quatity', IntegerType::class, [
                'attr' => ['min' => 1],
                'label' => 'Quantité',
            ])
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\LigneBCC'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_bcitems_form_type';
    }
}
