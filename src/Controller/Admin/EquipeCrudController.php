<?php

namespace App\Controller\Admin;

use App\Entity\Equipe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EquipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipe::class;
    }

    public function configureFields(string $pageName): iterable
    {

        yield IdField::new('id')
            ->onlyOnIndex();
        yield Field::new('nom_equipe');
        yield ImageField::new('logo_equipe')
        ->setBasePath('/')
        ->setUploadDir('public/img/logo_equipe')
        ->setUploadedFileNamePattern('/img/logo_equipe/[slug].[extension]')
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
        yield AssociationField::new('entraineur');

    }

    public function configureActions(Actions $actions): Actions
    {


            return $actions

            ->add(Crud::PAGE_INDEX, Action::DETAIL)

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
                return $action->setIcon('fa-solid fa-plus')->setLabel('Nouvelle Equipe');
                
            })

            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa-regular fa-trash-can')->setLabel('Supprimer Equipe');
                
            })

            ->update(Crud::PAGE_DETAIL, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa-regular fa-trash-can')->setLabel('Supprimer Equipe');
                
            })

            
        ;
    }
}
