<?php

namespace App\Form;

use App\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ProductName', TextType::class, [
                 'label' => 'Nom du produit',
                 'help' => 'Vous devez rentrer le nom du produit ici',  
                 'attr' => [ 
                     'placeholder' => 'Produit',
                     ],
                 'constraints' => [ 
                      new Regex([ 'pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/',
                      'message' => 'Caratère(s) non valide(s)' ]),
                    ] 
                  ])
            ->add('CategoryID',IntegerType::class, [
                'label' => 'Identifiant de la categorie',
                'help' => 'Vous devez rentrer l\'id du produit',  
                'attr' => [ 
                    'placeholder' => '2',
                    ],
                'constraints' => [ 
                     new Regex([ 'pattern' => '/^[0-9]+$/',
                     'message' => 'Caratère(s) non valide(s)' ]),
                   ] 
                 ])
            ->add('QuantityPerUnit')
            ->add('UnitPrice')
            ->add('UnitsInStock')
            ->add('UnitsOnOrder')
            ->add('ReorderLevel')
            ->add('Discontinued')
            ->add('Supplier')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
