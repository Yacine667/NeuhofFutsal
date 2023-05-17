<?php

namespace App\Controller\Admin;

use App\Entity\Entraineur;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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
            ->setUploadedFileNamePattern('/img/entraineurs/[slug].[extension]');
        yield Field::new('video_entraineur');
        yield AssociationField::new('equipes');

    }
}
