<?php

namespace App\Controller\Admin;

use App\Entity\Ville;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VilleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ville::class;
    }
    
    public function configureFields(string $pageName): iterable
    {

        yield IdField::new('id')
            ->onlyOnIndex();
        yield Field::new('nom_ville');
        yield AssociationField::new('stades')
            ->onlyOnIndex();

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
                return $action->setIcon('fa-solid fa-plus')->setLabel('Nouvelle Ville');
                
            })

            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa-regular fa-trash-can')->setLabel('Supprimer Ville');
                
            })

            ->update(Crud::PAGE_DETAIL, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa-regular fa-trash-can')->setLabel('Supprimer Ville');
                
            })

            
        ;
    }
}
