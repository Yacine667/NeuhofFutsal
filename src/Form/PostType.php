<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('texte_post', TextareaType::class, [
                'label' => false,
                'attr' => ['class' => 'messageBox','Maxlength' => 255,]
            ])

            ->add('ajouter', SubmitType::class, [
                'label' => 'Commenter',
                'attr' => ['class' => 'btnAjouter']
            ])
        ;
            // ->add('user')
            // ->add('actualite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
