<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ZipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('zip',  IntegerType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un code postal a rechercher'
                    ])
                ]
            ])
            ->add('city',  TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un nom de localisation a rechercher '
                    ])
                ]
            ])
            ->add('Filtrer', SubmitType::class, [ ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
