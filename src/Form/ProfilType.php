<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[ 
            'required' => true,
            'constraints' => [
                new NotBlank([
                  'message' => 'Veuillez saisir une adresse email'
                ])
            ]
         ])
            ->add('pseudo',TextType::class,[ 
                'required' => true,
                'constraints' => [
                    new NotBlank([
                      'message' => 'Veuillez saisir un pseudonyme'
                    ]),
                    new Length([
                      'min' => 4,
                      'minMessage' => 'Le pseudo doit contenir au minimum {{ limit }} caractères'
                    ]),
                    new Regex('/^[a-zA-Z0-9 ]+$/', 
                    'Les caractères spéciaux ne sont pas autorisé')


                ]
             ])
            
            ->add('edit', SubmitType::class, [
                    'label' => 'Editer',
                    'attr' => ['class' => 'btnAjouter']
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'edit' => false
        ]);
        
    }
}
