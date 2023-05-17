<?php

namespace App\Controller\Admin;

use App\Entity\Joueur;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class JoueurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Joueur::class;
    }

    public function configureFields(string $pageName): iterable
    {

        yield IdField::new('id')
            ->onlyOnIndex();
        yield Field::new('nom_joueur');
        yield Field::new('prenom_joueur');
        yield Field::new('date_naissance_joueur');
        yield AssociationField::new('equipe');
        yield Field::new('numero_joueur')
            ->hideOnIndex();
        yield Field::new('poste_joueur')
            ->hideOnIndex();
        yield ImageField::new('photo_joueur')
            ->setBasePath('/')
            ->setUploadDir('public/img/joueurs')
            ->setUploadedFileNamePattern('/img/joueurs/[slug].[extension]');
        yield Field::new('video_joueur')
            ->hideOnIndex();
        yield Field::new('note_attaque')
            ->hideOnIndex();
        yield Field::new('note_defense')
            ->hideOnIndex();
        yield Field::new('note_passe')
            ->hideOnIndex();
        yield Field::new('note_drible')
            ->hideOnIndex();
        yield Field::new('note_gardien')
            ->hideOnIndex();
        yield Field::new('note_tir')
            ->hideOnIndex();

    }
}
