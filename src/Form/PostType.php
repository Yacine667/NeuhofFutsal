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
                'attr' => ['class' => 'messageBox','Maxlength' => 2500,],
                'help' => 'Le nombre de caractères maximal est 2500.',
            ])  ;
            
            if(!$options['edit']){
                $builder->add('ajouter', SubmitType::class, [
                    'label' => 'Commenter',
                    'attr' => ['class' => 'btnAjouter']
                ]);
            } else {
                $builder->add('edit', SubmitType::class, [
                    'label' => 'Editer',
                    'attr' => ['class' => 'btnAjouter']
                ]);
    }}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
            'edit' => false
        ]);
    }
}
