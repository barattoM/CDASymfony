<?php

namespace App\Form;

use App\Entity\Products;
use App\Entity\Suppliers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
                'attr' => [ 
                    'placeholder' => '2',
                    ],
                'constraints' => [ 
                     new Regex([ 'pattern' => '/^[0-9]+$/',
                     'message' => 'Caratère(s) non valide(s)' ]),
                   ] 
                 ])
            ->add('QuantityPerUnit',TextType::class, [
                'label' => 'Quantité par unité',
                'attr' => [ 
                    'placeholder' => 'Quantité par unité',
                    ],
                ])
            ->add('UnitPrice',NumberType::class, [
                'label' => 'Prix unitaire',
                'attr' => [ 
                    'placeholder' => 'Prix unitaire',
                    ],
                ])
            ->add('UnitsInStock',IntegerType::class, [
                'label' => 'Quantité en stock',
                'attr' => [ 
                    'placeholder' => 'Stock',
                    ],
                ])
            ->add('UnitsOnOrder',IntegerType::class, [
                'label' => 'Quantité en commande',
                'attr' => [ 
                    'placeholder' => 'Quantité en commande',
                    ],
                ])
            ->add('ReorderLevel',IntegerType::class, [
                'label' => 'Niveau d\'alerte',
                'attr' => [ 
                    'placeholder' => 'Niveau d\'alerte',
                    ],
                ])
            ->add('Discontinued')
            ->add('Supplier',EntityType::class, [
                'class' => Suppliers::class,
                'label' => 'Fournisseur',
                'placeholder' => '-- Choisisser un fournisseur --',
                ])
            ->add('picture2', FileType::class, [ 
                'label' => 'Photo de profil',
                 //unmapped => fichier non associé à aucune propriété d'entité, validation impossible avec les annotations 
                 'mapped' => false, 
                 // pour éviter de recharger la photo lors de l'édition du profil
                 'required' => false, 
                 'constraints' => [ 
                    new Image([ 
                        'maxSize' => '2000k',
                        'mimeTypesMessage' => 'Veuillez insérer une photo au format jpg, jpeg ou png'
                        ])
                    ] 
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
