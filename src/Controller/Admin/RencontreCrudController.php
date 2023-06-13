<?php

namespace App\Controller\Admin;

use App\Entity\Rencontre;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RencontreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rencontre::class;
    }

    public function configureFields(string $pageName): iterable
    {

        yield IdField::new('id')
            ->onlyOnIndex();
        yield Field::new('date_rencontre');
        yield Field::new('score_rencontre');
        yield AssociationField::new('stade');
        yield CollectionField::new('opposes')
            ->setEntryIsComplex()
            ->renderExpanded()
            ->onlyOnIndex();

    }
}
