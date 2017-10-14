<?php



namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class ProduitFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libele',TextType::class)
            ->add('etat',ChoiceType::class ,array(
                'choices' =>array(
                    'En vente'=>'En vente',
                    'Hors vente'=>'Hors vente'
                )
            ))
            ->add('type',ChoiceType::class ,array(
                'choices' =>array(
                    'Matière première'=>'Matière première',
                    'Manifacturé'=>'Manifacturé'
                )
            ))
            ->add('codedouane',TextType::class)
            ->add('tva', EntityType::class, array(
                'class' => 'AppBundle:Taxe',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.montant', 'ASC')
                        ->where('u.active =1');
                },
                'choice_label' => 'montant',

            ))

            ->add('category', EntityType::class, array(
                'class' => 'AppBundle:Category',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.nom', 'ASC');
                },
                'choice_label' => 'nom',

            ))
            ->add('prixachat',NumberType::class)
            ->add('prixvente',NumberType::class)
            ->add('limitestock',NumberType::class)
            ->add('description',TextareaType::class)
            ->add('origine',CountryType::class,array(
                'placeholder' => 'Sélectionnez le pays',
                'empty_data' => \Locale::getDefault()


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
            'data_class' => 'AppBundle\Entity\Produit'
        ]);

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_produit_form_type';
    }
}
