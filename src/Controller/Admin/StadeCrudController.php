<?php

namespace App\Controller\Admin;

use App\Entity\Stade;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StadeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Stade::class;
    }

    public function configureFields(string $pageName): iterable
    {

        yield IdField::new('id')
            ->onlyOnIndex();
        yield Field::new('nom_stade');
        yield Field::new('adresse_stade');
        yield Field::new('photo_stade');
        yield AssociationField::new('ville');

    }
}
