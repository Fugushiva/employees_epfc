<?php

namespace App\Form;

use App\Entity\Departement;
use App\Entity\DeptManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class DepartementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('deptNo', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^d\d{3}$/',
                        'message' => 'Le numéro de département doit être la lettre "d" suivie de 3 chiffres.',
                    ]),
                ],
            ])
            ->add('deptName')
            ->add('description')
            ->add('adresse')
            ->add('roi')
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Departement::class,
        ]);
    }
}
