<?php

namespace App\Form;

use App\Entity\Cv;
use App\Entity\Entreprise;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'control-label mb-1',
                        'placeholder' => 'nom',
                    ]
                ])
            ->add('prenom', TextType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'control-label mb-1',
                        'placeholder' => 'prenom',
                    ]
                ])
            ->add('age', NumberType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'control-label mb-1',
                        'placeholder' => 'age',
                    ]
                ])
            ->add('adresse', TextType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'control-label mb-1',
                        'placeholder' => 'adresse',
                    ]
                ])
            ->add('email', TextType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'control-label mb-1',
                        'placeholder' => 'email',
                    ]
                ])
            ->add('tel', TextType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'control-label mb-1',
                        'placeholder' => 'tel',
                    ]
                ])
            ->add('specialite', TextType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'control-label mb-1',
                        'placeholder' => 'specialite',
                    ]
                ])
            ->add('login', TextType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'control-label mb-1',
                        'placeholder' => 'login',
                    ]
                ])
            ->add('password', PasswordType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'control-label mb-1',
                        'placeholder' => 'password',
                    ]
                ])
            ->add('niveauEtude', TextType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'control-label mb-1',
                        'placeholder' => 'niveau d\'etude',
                    ]
                ])
            ->add('exProfessionnel', NumberType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'control-label mb-1',
                        'placeholder' => 'experience professionnal',
                    ]
                ])
            ->add('entreprise',EntityType::class,
        [
            'class' => Entreprise::class,
            'choice_label' => 'id',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cv::class,
        ]);
    }
}
