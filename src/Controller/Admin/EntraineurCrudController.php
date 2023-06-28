<?php

namespace App\Controller\Admin;

use App\Entity\Entraineur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class EntraineurCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Entraineur::class;
    }
    
    public function configureFields(string $pageName): iterable
    {

        yield IdField::new('id')
            ->onlyOnIndex();
        yield Field::new('nom_entraineur');
        yield Field::new('prenom_entraineur');
        yield ImageField::new('photo_entraineur')
            ->setBasePath('/')
            ->setUploadDir('public/img/entraineurs')
            ->setUploadedFileNamePattern('/img/entraineurs/[slug].[extension]')
            ->setHelp('Formats autorisés : .jpg / .png <br> Taille maximum 5mo')
            ->setFormTypeOption(
                'constraints',
                [
                    new \App\Validator\Constraints\EasyAdminFile([
                        'maxSize' => '5M',
                        'mimeTypes' => [ // pour autoriser seulement les formats suivants :
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Veuillez utiliser un fichier autorisé.'
                    ])
                ]
            );
        yield Field::new('video_entraineur');
        yield AssociationField::new('equipes')
            ->onlyOnIndex();
    }



    public function configureActions(Actions $actions): Actions
    {

        // J'appelle la fonction qui est dans mon controller avec linkToRoute, et je met l'id de l'entraineur en parametre de la fonction

        $deleteTrainer = Action::new('deleteTrainer', 'Supprimer Entraineur', 'fa-solid fa-user-xmark')

            ->linkToRoute('entraineur_delete', function (Entraineur $entraineur): array {
                return [
                    'id' => $entraineur->getId(),

                ];
            });

            return $actions

            ->add(Crud::PAGE_INDEX, $deleteTrainer)
            ->add(Crud::PAGE_DETAIL, $deleteTrainer)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->disable(Action::DELETE)
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa-solid fa-pen')->setLabel('Modifier Informations');
                
            })
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setIcon('fa-solid fa-eye')->setLabel('Voir Détails');
                
            })

            ->update(Crud::PAGE_DETAIL, Action::INDEX, function (Action $action) {
                return $action->setIcon('fa-solid fa-eye')->setLabel('Voir Liste');
                
            })

            ->update(Crud::PAGE_DETAIL, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa-solid fa-pen')->setLabel('Modifier Informations');
                
            })

            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa-solid fa-plus')->setLabel('Nouvel Entraineur');
                
            })

            
        ;
    }
}
