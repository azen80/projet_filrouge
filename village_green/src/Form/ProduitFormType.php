<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Fournisseur;
use App\Entity\SousRubrique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProduitFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle_court')
            ->add('description')
            ->add('reference_fourn')
            ->add('prix_achat')
            ->add('photo')
            ->add('statut_publication')
            ->add('Sous_rubrique', EntityType::class, [
                'class' => SousRubrique::class,
                'choice_label' => 'nomsousrubrique',
            ])
            ->add('Fournisseur', EntityType::class, [
                'class' => Fournisseur::class,
                'choice_label' => 'nom',
            ])
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
