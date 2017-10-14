<?php

namespace AppBundle\Form;

use AppBundle\Entity\Produit;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BonCommandeClientFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('client', EntityType::class, array(
               'class' => 'AppBundle:Client',
               'query_builder' => function (EntityRepository $er) {
                   return $er->createQueryBuilder('u')
                       ->orderBy('u.raison', 'ASC');
               },
               'choice_label' => 'raison',

           ))


            ->add('ligne', CollectionType::class, array(
                'entry_type' => BCitemsFormType::class,
                'allow_add'    => true,
                'allow_delete'    => true,
                'by_reference' => false,

            ))

        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\BonCommandeClient'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_bon_commande_client_form_type';
    }
}
